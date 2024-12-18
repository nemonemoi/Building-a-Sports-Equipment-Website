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

    // Nếu không có nội dung tin nhắn
    if (empty($userMessage)) {
        echo json_encode(['bot_message' => "Xin chào, bạn cần tôi giúp gì?"]);
        exit;
    }

    // Các môn thể thao
    $sports = ['bóng rổ', 'bóng đá', 'cầu lông', 'tennis', 'quần vợt', 'bóng chuyền', 'gym'];

    // Các thương hiệu
    $brands = ['asics', 'nike', 'adidas', 'puma', 'jordan', 'spalding', 'wilson'];

    // Từ khóa tìm kiếm
    $keywordsAccessories = ['phụ kiện', 'accessory', 'đồ dùng'];
    $keywordsBall = ['bóng', 'quả bóng', 'ball'];
    $keywordsEquipment = ['dụng cụ', 'equipment', 'dụng cụ thể thao', 'thể dục'];


    // Loại sản phẩm
    $keywordsCategory = [
        'bóng' => 1, 
        'phụ kiện' => 2, 
        'dụng cụ' => 3
    ];

    // Biến kiểm tra đã xử lý
    $handled = false;




    // Tìm kiếm theo môn thể thao
    $foundSport = null;
    foreach ($sports as $sport) {
        if (stripos($userMessage, $sport) !== false) {
            $foundSport = $sport;
            break;
        }
    }

    // Tìm kiếm theo thương hiệu
    $foundBrand = null;
    foreach ($brands as $brand) {
        if (stripos($userMessage, $brand) !== false) {
            $foundBrand = $brand;
            break;
        }
    }

    // Tìm kiếm theo loại sản phẩm
    $foundCategory = null; // Mã loại sản phẩm tìm được
    foreach ($keywordsCategory as $keyword => $categoryId) {
        if (stripos($userMessage, $keyword) !== false) {
            $foundCategory = $categoryId;
            break;
        }
    }

    

    // Kiểm tra giá nhỏ hơn hoặc bằng "giá khoảng A trở xuống"
    $maxPrice = null;
    if (preg_match('/giá.*(?:khoảng|dưới|trở xuống|<=?)\s*(\d+)/i', $userMessage, $matches)) {
        $maxPrice = (int)$matches[1];
    }

    // Xử lý chào hỏi hoặc tìm kiếm sản phẩm
    $sql = "SELECT sp.SP_MA, sp.SP_TEN, sp.SP_HINHANH, sp.SP_GIA 
            FROM san_pham sp 
            JOIN nha_san_xuat nsx ON sp.NSX_MA = nsx.NSX_MA 
            WHERE 1=1"; // Điều kiện luôn đúng để nối thêm các điều kiện khác

    if ($foundSport) {
        $sql .= " AND sp.SP_THETHAO = '" . $conn->real_escape_string($foundSport) . "'";
    }

    if ($foundBrand) {
        $sql .= " AND nsx.NSX_TEN = '" . $conn->real_escape_string($foundBrand) . "'";
    }

    if ($foundCategory) {
        $sql .= " AND sp.LSP_MA = $foundCategory";
    }
    
    if ($maxPrice !== null) {
        $sql .= " AND sp.SP_GIA <= $maxPrice";
    }

    $sql .= " LIMIT 5";

    $result = $conn->query($sql);
    $botMessage = "Tôi gợi ý bạn những sản phẩm phù hợp với yêu cầu của bạn:";
    $botMessage .= fetchProducts($sql, $conn);

    // Trả về phản hồi dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode(['bot_message' => $botMessage]);
    exit;
}

// Hàm lấy sản phẩm từ cơ sở dữ liệu
function fetchProducts($sql, $conn) {
    $result = $conn->query($sql);
    $output = "";

    if ($result && $result->num_rows > 0) {
        $output .= "<div style='display: flex; flex-wrap: wrap; gap: 10px;'>";
        while ($row = $result->fetch_assoc()) {
            $imagePath = "/draft/assets/img/product_img/" . htmlspecialchars($row['SP_HINHANH']);
            $output .= "
                <a href='single_products.php?id=" . htmlspecialchars($row['SP_MA']) . "' style='text-decoration: none; color: inherit;'>
                    <div style='border: 1px solid #ccc; padding: 10px; width: 150px; text-align: center;'>
                        <img src='" . $imagePath . "' alt='" . htmlspecialchars($row['SP_TEN']) . "' style='width:100px;height:auto;'><br>
                        <strong>" . htmlspecialchars($row['SP_TEN']) . "</strong><br>
                        <span>Giá: " . number_format($row['SP_GIA'], 0, ',', '.') . " VND</span>
                    </div>
                </a>";
        }
        $output .= "</div>";
    } else {
        $output .= " Hiện tại không có sản phẩm nào.";
    }

    return $output;
}
?>
