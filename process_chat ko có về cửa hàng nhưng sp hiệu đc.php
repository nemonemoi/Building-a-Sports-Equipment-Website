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

    // Biến kiểm tra đã xử lý
    $handled = false;

    

    // Nếu chưa xử lý, kiểm tra các trường hợp còn lại (thể thao, thương hiệu, phụ kiện...)
    if (!$handled) {
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

        // Xử lý chào hỏi hoặc tìm kiếm sản phẩm
        if ($foundSport && $foundBrand) {
            $botMessage = "Tôi gợi ý bạn những sản phẩm thuộc môn thể thao '$foundSport' của nhà sản xuất '$foundBrand':";
            $sql = "SELECT sp.SP_MA, sp.SP_TEN, sp.SP_HINHANH, sp.SP_GIA 
                    FROM san_pham sp 
                    JOIN nha_san_xuat nsx ON sp.NSX_MA = nsx.NSX_MA 
                    WHERE sp.SP_THETHAO = '" . $conn->real_escape_string($foundSport) . "' 
                      AND nsx.NSX_TEN = '" . $conn->real_escape_string($foundBrand) . "' LIMIT 5";
            $botMessage .= fetchProducts($sql, $conn);
            $handled = true;
        } elseif ($foundSport) {
            $botMessage = "Tôi gợi ý bạn những sản phẩm cho môn thể thao '$foundSport':";
            $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA 
                    FROM san_pham 
                    WHERE SP_THETHAO = '" . $conn->real_escape_string($foundSport) . "' LIMIT 5";
            $botMessage .= fetchProducts($sql, $conn);
            $handled = true;
        } elseif ($foundBrand) {
            $botMessage = "Tôi gợi ý bạn những sản phẩm của nhà sản xuất '$foundBrand':";
            $sql = "SELECT sp.SP_MA, sp.SP_TEN, sp.SP_HINHANH, sp.SP_GIA 
                    FROM san_pham sp 
                    JOIN nha_san_xuat nsx ON sp.NSX_MA = nsx.NSX_MA 
                    WHERE nsx.NSX_TEN = '" . $conn->real_escape_string($foundBrand) . "' LIMIT 5";
            $botMessage .= fetchProducts($sql, $conn);
            $handled = true;
        }
    }

    // Tìm kiếm theo khoảng giá
    if (!$handled) {
        // Kiểm tra khoảng giá "giá từ A đến B"
        if (preg_match('/giá từ\s*(\d+)\s*đến\s*(\d+)/i', $userMessage, $matches)) {
            $minPrice = (int)$matches[1];
            $maxPrice = (int)$matches[2];

            $botMessage = "Tôi gợi ý bạn những sản phẩm trong khoảng giá từ " . number_format($minPrice, 0, ',', '.') . " VND đến " . number_format($maxPrice, 0, ',', '.') . " VND:";
            $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA 
                FROM san_pham 
                WHERE SP_GIA BETWEEN $minPrice AND $maxPrice LIMIT 5";
            $botMessage .= fetchProducts($sql, $conn);
            $handled = true;
     }
    // Kiểm tra giá nhỏ hơn hoặc bằng "giá khoảng A trở xuống"
    elseif (preg_match('/giá.*(?:khoảng|dưới|trở xuống|<=?)\s*(\d+)/i', $userMessage, $matches)) {
        $maxPrice = (int)$matches[1];

        $botMessage = "Tôi gợi ý bạn những sản phẩm có giá từ 0 đến " . number_format($maxPrice, 0, ',', '.') . " VND:";
        $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA 
                FROM san_pham 
                WHERE SP_GIA <= $maxPrice LIMIT 5";
        $botMessage .= fetchProducts($sql, $conn);
        $handled = true;
    }
    // Kiểm tra giá lớn hơn hoặc bằng "giá khoảng A trở lên"
    elseif (preg_match('/giá.*(?:khoảng|trên|trở lên|>=?)\s*(\d+)/i', $userMessage, $matches)) {
        $minPrice = (int)$matches[1];

        $botMessage = "Tôi gợi ý bạn những sản phẩm có giá từ " . number_format($minPrice, 0, ',', '.') . " VND trở lên:";
        $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA 
                FROM san_pham 
                WHERE SP_GIA >= $minPrice LIMIT 5";
        $botMessage .= fetchProducts($sql, $conn);
        $handled = true;
    }
}

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
