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



    // Tìm sản phẩm mới
if (!$handled && preg_match('/(sản phẩm mới|mới nhất|vừa cập nhật)/i', $userMessage)) {
    $botMessage = "Đây là những sản phẩm mới nhất trong cửa hàng:";
    $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA 
            FROM san_pham 
            ORDER BY SP_NGAYTAO DESC 
            LIMIT 5";

    $botMessage .= fetchProducts($sql, $conn);
    $handled = true;
}


    // Xử lý tìm kiếm sản phẩm nếu chưa xử lý
    if (!$handled) {
        // Các môn thể thao
        $sports = ['bóng rổ', 'bóng đá', 'cầu lông', 'tennis', 'quần vợt', 'bóng chuyền', 'gym'];

        // Các thương hiệu
        $brands = ['asics', 'nike', 'adidas', 'puma', 'jordan', 'spalding', 'wilson'];

        // Loại sản phẩm
        $keywordsCategory = [
            'bóng' => 1, 
            'phụ kiện' => 2, 
            'dụng cụ' => 3
        ];

        // Kiểm tra thông tin truy vấn sản phẩm
        $foundSport = null;
        foreach ($sports as $sport) {
            if (stripos($userMessage, $sport) !== false) {
                $foundSport = $sport;
                break;
            }
        }

        $foundBrand = null;
        foreach ($brands as $brand) {
            if (stripos($userMessage, $brand) !== false) {
                $foundBrand = $brand;
                break;
            }
        }

        $foundCategory = null;
        foreach ($keywordsCategory as $keyword => $categoryId) {
            if (stripos($userMessage, $keyword) !== false) {
                $foundCategory = $categoryId;
                break;
            }
        }

        // Kiểm tra giá
        $minPrice = null;
        $maxPrice = null;
        $rangeMinPrice = null;
        $rangeMaxPrice = null;

        if (preg_match('/giá.*(?:khoảng|từ|trở lên|>=?)\s*(\d+)/i', $userMessage, $matches)) {
            $minPrice = (int)$matches[1];
        }

        if (preg_match('/giá.*(?:khoảng|dưới|trở xuống|<=?)\s*(\d+)/i', $userMessage, $matches)) {
            $maxPrice = (int)$matches[1];
        }

        if (preg_match('/giá.*(?:từ|trong khoảng|giữa|>=?)\s*(\d+)\s*(?:đến|và|&|-|,)\s*(\d+)/i', $userMessage, $matches)) {
            $rangeMinPrice = (int)$matches[1];
            $rangeMaxPrice = (int)$matches[2];
        }

        // Tạo truy vấn SQL
        $sql = "SELECT sp.SP_MA, sp.SP_TEN, sp.SP_HINHANH, sp.SP_GIA 
                FROM san_pham sp 
                JOIN nha_san_xuat nsx ON sp.NSX_MA = nsx.NSX_MA 
                WHERE 1=1";

        if ($foundSport) {
            $sql .= " AND sp.SP_THETHAO = '" . $conn->real_escape_string($foundSport) . "'";
        }

        if ($foundBrand) {
            $sql .= " AND nsx.NSX_TEN = '" . $conn->real_escape_string($foundBrand) . "'";
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

        $sql .= " LIMIT 5";

        $botMessage = "Tôi gợi ý bạn những sản phẩm phù hợp với yêu cầu của bạn:";
        $botMessage .= fetchProducts($sql, $conn);
    }

    // Tìm sản phẩm theo môn thể thao và loại sản phẩm
    if (!$handled && preg_match('/(tìm|xem|mua).*(dụng cụ|phụ kiện|bóng).*(bóng rổ|bóng đá|cầu lông|tennis|thể dục|bóng chuyền)/i', $userMessage, $matches)) {
        $productType = $matches[2]; // Loại sản phẩm: dụng cụ, phụ kiện, bóng
        $sport = $matches[3]; // Môn thể thao: bóng rổ, bóng đá, ...

        // Loại sản phẩm
        $keywordsCategory = [
            'bóng' => 1, 
            'phụ kiện' => 2, 
            'dụng cụ' => 3
        ];

        // Xác định mã loại sản phẩm
        $typeId = $keywordsCategory[strtolower($productType)] ?? null;

        // Kiểm tra nếu môn thể thao và loại sản phẩm hợp lệ
        if ($typeId) {
            // Câu truy vấn SQL, chắc chắn rằng cả môn thể thao và loại sản phẩm đều được kiểm tra
            $sql = "SELECT sp.SP_MA, sp.SP_TEN, sp.SP_HINHANH, sp.SP_GIA 
                    FROM san_pham sp 
                    WHERE sp.SP_THETHAO = '" . $conn->real_escape_string($sport) . "' 
                    AND sp.LSP_MA = $typeId
                    LIMIT 5";
            // Đảm bảo câu truy vấn SQL chính xác
            error_log("SQL Query: $sql");

            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $botMessage = "Dưới đây là những $productType của môn $sport mà bạn có thể quan tâm:";
                $botMessage .= fetchProducts($sql, $conn);
            } else {
                $botMessage = "Rất tiếc, chúng tôi chưa có $productType cho môn $sport trong hệ thống.";
            }
        } else {
            $botMessage = "Rất tiếc, chúng tôi chưa có $productType cho môn $sport trong hệ thống.";
        }

        $handled = true;
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
        $output .= "<p>Hiện tại không có sản phẩm nào.</p>";
    }

    return $output;
}




?>


