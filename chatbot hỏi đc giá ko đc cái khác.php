<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sportstore";

// Kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessage = trim($_POST['message'] ?? ''); // Lấy message từ người dùng
    $botMessage = "Tôi chưa hiểu ý bạn, bạn có thể nói rõ hơn không?"; // Phản hồi mặc định
    $handled = false; // Biến kiểm tra xử lý

    // Nếu không có nội dung tin nhắn
    if (empty($userMessage)) {
        echo json_encode(['bot_message' => "Xin chào, bạn cần tôi giúp gì?"]);
        exit;
    }

    // Thông tin cửa hàng
    if (!$handled && preg_match('/(giờ mở cửa|làm việc|địa chỉ|cửa hàng)/i', $userMessage)) {
        if (preg_match('/(giờ mở cửa|mấy giờ)/i', $userMessage)) {
            $botMessage = "Cửa hàng mở cửa từ 8:00 sáng đến 9:00 tối mỗi ngày, bao gồm cả cuối tuần.";
        } elseif (preg_match('/(địa chỉ|ở đâu)/i', $userMessage)) {
            $botMessage = "Cửa hàng của chúng tôi nằm tại: Số 44, đường 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ.";
        } elseif (preg_match('/(cuối tuần|chủ nhật)/i', $userMessage)) {
            $botMessage = "Chúng tôi làm việc vào cả thứ 7 và chủ nhật.";
        }
        $handled = true;
    }

    // Thông tin chính sách đổi trả
    if (!$handled && preg_match('/(trả hàng|chính sách|đổi hàng|hoàn tiền)/i', $userMessage)) {
        $botMessage = "Chính sách đổi trả của cửa hàng như sau: Sản phẩm được đổi trả trong vòng 7 ngày kể từ ngày mua. Điều kiện: Sản phẩm còn nguyên tem, hộp và không bị hư hỏng.";
        $handled = true;
    }

    // Xử lý câu hỏi về sản phẩm theo giá
    $minPrice = null;
    $maxPrice = null;
    $rangeMinPrice = null;
    $rangeMaxPrice = null;

    if (preg_match('/giá.*(?:trên|>=|lớn hơn)\s*(\d+)/i', $userMessage, $matches)) {
        $minPrice = (int)$matches[1];
    }
    if (preg_match('/giá.*(?:dưới|<=|nhỏ hơn)\s*(\d+)/i', $userMessage, $matches)) {
        $maxPrice = (int)$matches[1];
    }
    if (preg_match('/giá.*(?:từ|trong khoảng|giữa)\s*(\d+)\s*(?:đến|và|,|-)\s*(\d+)/i', $userMessage, $matches)) {
        $rangeMinPrice = (int)$matches[1];
        $rangeMaxPrice = (int)$matches[2];
    }

    // Các môn thể thao
    $sports = ['bóng rổ', 'bóng đá', 'cầu lông', 'tennis', 'gym', 'bóng chuyền'];

    // Loại sản phẩm
    $keywordsCategory = [
        'bóng' => 1,
        'phụ kiện' => 2,
        'dụng cụ' => 3
    ];

    // Kiểm tra môn thể thao
    $foundSport = null;
    foreach ($sports as $sport) {
        if (stripos($userMessage, $sport) !== false) {
            $foundSport = $sport;
            break;
        }
    }

    // Kiểm tra loại sản phẩm
    $foundCategory = null;
    foreach ($keywordsCategory as $keyword => $categoryId) {
        if (stripos($userMessage, $keyword) !== false) {
            $foundCategory = $categoryId;
            break;
        }
    }

    // Tạo câu truy vấn SQL
    $sql = "SELECT sp.SP_MA, sp.SP_TEN, sp.SP_HINHANH, sp.SP_GIA 
            FROM san_pham sp 
            WHERE 1=1";

    if ($foundSport) {
        $sql .= " AND sp.SP_THETHAO = '" . $conn->real_escape_string($foundSport) . "'";
    }

    if ($foundCategory) {
        $sql .= " AND sp.LSP_MA = $foundCategory";
    }

    if ($rangeMinPrice !== null && $rangeMaxPrice !== null) {
        $sql .= " AND sp.SP_GIA BETWEEN $rangeMinPrice AND $rangeMaxPrice";
    } elseif ($minPrice !== null) {
        $sql .= " AND sp.SP_GIA >= $minPrice";
    } elseif ($maxPrice !== null) {
        $sql .= " AND sp.SP_GIA <= $maxPrice";
    }

    $sql .= " LIMIT 3";

    // Lấy dữ liệu và phản hồi
    if (!$handled) {
        $botMessage = "Dưới đây là những sản phẩm phù hợp với yêu cầu của bạn:";
        $botMessage .= fetchProducts($sql, $conn);
    }

    // Trả về phản hồi
    header('Content-Type: application/json');
    echo json_encode(['bot_message' => $botMessage]);
    exit;
}

function fetchProducts($sql, $conn) {
    $result = $conn->query($sql);
    $output = "";

    if ($result && $result->num_rows > 0) {
        $output .= "<div class='product-container' style='display: flex; gap: 5px; padding: 5px 0; justify-content: space-between;'>";
        while ($row = $result->fetch_assoc()) {
            $imagePath = "/draft/assets/img/product_img/" . htmlspecialchars($row['SP_HINHANH']);
            $output .= "
                <div class='product' style='flex: 0 0 auto; width: 90px; text-align: center; border: 1px solid #ccc; padding: 5px;'>
                    <a href='single_products.php?id=" . htmlspecialchars($row['SP_MA']) . "' style='text-decoration: none; color: inherit;'>
                        <img src='" . $imagePath . "' alt='" . htmlspecialchars($row['SP_TEN']) . "' style='width: 60px; height: auto; margin-bottom: 3px;'><br>
                        <strong style='font-size: 11px; display: block; line-height: 1.2; word-wrap: break-word;'>" . htmlspecialchars($row['SP_TEN']) . "</strong><br>
                        <span style='color: #333; font-size: 10px; font-weight: bold;'>Giá: " . number_format($row['SP_GIA'], 0, ',', '.') . " VND</span>
                    </a>
                </div>";
        }
        $output .= "</div>";
    } else {
        $output .= "<p>Hiện tại không có sản phẩm nào phù hợp.</p>";
    }

    return $output;
}
?>
