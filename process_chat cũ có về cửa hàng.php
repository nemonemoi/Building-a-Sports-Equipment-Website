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

if (empty($_POST['message'])) {
    echo json_encode(['bot_message' => "Xin chào, bạn cần tôi giúp gì?"]);
    exit;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessage = $_POST['message'];

    // Khởi tạo botMessage mặc định
    $botMessage = "Tôi chưa hiểu ý bạn, bạn có thể nói rõ hơn không?";


    // Mảng từ khóa
    // $keywordsGreeting = ['chào', 'hello', 'hi', 'xin chào'];
    $keywordsAccessories = ['phụ kiện', 'accessory', 'đồ dùng'];
    $keywordsBall = ['bóng', 'quả bóng', 'ball'];
    $keywordsEquipment = ['dụng cụ', 'equipment', 'dụng cụ thể thao', 'thể dục'];

    // Mảng từ khóa về hãng và môn thể thao
    $brands = ['nike', 'adidas', 'puma', 'asics', 'wilson', 'spalding'];
    
    $sports = ['bóng rổ', 'bóng đá', 'bóng chuyền', 'cầu lông', 'tennis'];


    // Biến kiểm tra đã xử lý
    $handled = false;

    // Xử lý chào hỏi
    // if (checkKeywords($userMessage, $keywordsGreeting)) {
    //     $botMessage = "Xin chào, bạn muốn tôi giúp gì?";
    //     $handled = true;
    // }

if (!$handled) {
    $foundSport = null;

    // Duyệt qua danh sách môn thể thao
    foreach ($sports as $sport) {
        if (stripos($userMessage, $sport) !== false) {
            $foundSport = $sport;
            break;
        }
    }

    if ($foundSport) {
        $botMessage = "Tôi gợi ý bạn những sản phẩm liên quan đến '$foundSport':";
        $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA 
                FROM san_pham 
                WHERE SP_TEN LIKE '%" . $conn->real_escape_string($foundSport) . "%' LIMIT 5";
        $botMessage .= fetchProducts($sql, $conn);
        $handled = true;
    }
}

    

    // Xử lý từ khóa tìm các loại sản phẩm
    if (!$handled && checkKeywords($userMessage, $keywordsAccessories)) {
        $botMessage = "Tôi gợi ý bạn những phụ kiện thể thao sau:";
        $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA FROM san_pham WHERE LSP_MA = '2' LIMIT 3";
        $botMessage .= fetchProducts($sql, $conn);
        $handled = true;
    } elseif (!$handled && checkKeywords($userMessage, $keywordsBall)) {
        $botMessage = "Tôi gợi ý bạn những loại bóng sau:";
        $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA FROM san_pham WHERE LSP_MA = '1' LIMIT 3";
        $botMessage .= fetchProducts($sql, $conn);
        $handled = true;
    } elseif (!$handled && checkKeywords($userMessage, $keywordsEquipment)) {
        $botMessage = "Tôi gợi ý bạn những dụng cụ thể thao sau:";
        $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA FROM san_pham WHERE LSP_MA = '3' LIMIT 3";
        $botMessage .= fetchProducts($sql, $conn);
        $handled = true;
    }

    if (!$handled) {
    $foundSport = null;
    $foundBrand = null;

    // Tìm kiếm môn thể thao
    foreach ($sports as $sport) {
        if (stripos($userMessage, $sport) !== false) {
            $foundSport = $sport;
            break;
        }
    }

    // Tìm kiếm thương hiệu
    foreach ($brands as $brand) {
        if (stripos($userMessage, $brand) !== false) {
            $foundBrand = $brand;
            break;
        }
    }

    // Nếu tìm thấy cả môn thể thao và thương hiệu
    if ($foundSport && $foundBrand) {
        $botMessage = "Tôi gợi ý bạn những sản phẩm về '$foundSport' của hãng '$foundBrand':";
        $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA 
                FROM san_pham 
                WHERE SP_TEN LIKE '%" . $conn->real_escape_string($foundSport) . "%'
                  AND SP_TEN LIKE '%" . $conn->real_escape_string($foundBrand) . "%' LIMIT 5";
        $botMessage .= fetchProducts($sql, $conn);
        $handled = true;
    }
    // Nếu chỉ tìm thấy môn thể thao
    elseif ($foundSport) {
        $botMessage = "Tôi gợi ý bạn những sản phẩm liên quan đến '$foundSport':";
        $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA 
                FROM san_pham 
                WHERE SP_TEN LIKE '%" . $conn->real_escape_string($foundSport) . "%' LIMIT 5";
        $botMessage .= fetchProducts($sql, $conn);
        $handled = true;
    }
    // Nếu chỉ tìm thấy thương hiệu
    elseif ($foundBrand) {
        $botMessage = "Tôi gợi ý bạn những sản phẩm của hãng '$foundBrand':";
        $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA 
                FROM san_pham 
                WHERE SP_TEN LIKE '%" . $conn->real_escape_string($foundBrand) . "%' LIMIT 5";
        $botMessage .= fetchProducts($sql, $conn);
        $handled = true;
    }
}

    // Tìm kiếm theo hãng
    if (!$handled) {
        $foundBrand = null;
        foreach ($brands as $brand) {
            if (stripos($userMessage, $brand) !== false) { // Không phân biệt chữ hoa/chữ thường
                $foundBrand = $brand;
                break;
            }
        }

        if ($foundBrand) {
            $botMessage = "Tôi gợi ý bạn những sản phẩm của hãng '$foundBrand':";
            $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA 
                    FROM san_pham 
                    WHERE SP_TEN LIKE '%" . $conn->real_escape_string($foundBrand) . "%' LIMIT 5";
            $botMessage .= fetchProducts($sql, $conn);
            $handled = true;
        }
    }


    // Tìm sản phẩm mới
    if (!$handled && preg_match('/(sản phẩm mới|mới nhất|vừa cập nhật)/i', $userMessage)) {
        $botMessage = "Đây là những sản phẩm mới nhất trong cửa hàng:";
        $sql = "SELECT SP_MA, SP_TEN, SP_HINHANH, SP_GIA FROM san_pham ORDER BY SP_NGAYTAO DESC LIMIT 5";
        $botMessage .= fetchProducts($sql, $conn);
        $handled = true;
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
    if (!$handled && preg_match('/(đổi trả|chính sách|đổi hàng|hoàn tiền)/i', $userMessage)) {
        $botMessage = "Chính sách đổi trả của cửa hàng như sau: Sản phẩm được đổi trả trong vòng 7 ngày kể từ ngày mua. Điều kiện: Sản phẩm còn nguyên tem, hộp và không bị hư hỏng.";
        $handled = true;
    }

    // Kiểm tra tồn kho
    if (!$handled && preg_match('/(còn hàng|hết hàng|tình trạng hàng).*?([\w\d]+)/i', $userMessage, $matches)) {
        $productCode = $conn->real_escape_string($matches[2]);
        $sql = "SELECT SP_MA, SP_TEN, SP_SOLUONGTON FROM san_pham WHERE SP_MA = '$productCode'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $quantity = $row['SP_SOLUONG'];
            if ($quantity > 0) {
                $botMessage = "Sản phẩm mã '$productCode' còn $quantity sản phẩm trong kho.";
            } else {
                $botMessage = "Sản phẩm mã '$productCode' hiện đã hết hàng.";
            }
        } else {
            $botMessage = "Không tìm thấy thông tin sản phẩm mã '$productCode'.";
        }
        $handled = true;
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


    // Nếu không tìm thấy từ khóa phù hợp
    if (!$handled) {
        $botMessage = "Tôi không tìm thấy sản phẩm phù hợp với yêu cầu của bạn.";
    }

    // Trả về phản hồi dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode(['bot_message' => $botMessage]);
}

$conn->close();

    // Hàm kiểm tra từ khóa
    function checkKeywords($message, $keywords) {
        foreach ($keywords as $keyword) {
            if (stripos($message, $keyword) !== false) {
            return true;
            }
        }
        return false;
    }

    // Hàm lấy sản phẩm từ cơ sở dữ liệu
    function fetchProducts($sql, $conn) {
        $result = $conn->query($sql);
        $output = "";

        if ($result && $result->num_rows > 0) {
            $output .= "<div style='display: flex; flex-wrap: wrap; gap: 10px;'>";
            while ($row = $result->fetch_assoc()) {
                $imagePath = "/draft/assets/img/product_img/" . $row['SP_HINHANH'];
                $output .= "
                
                    <a href='single_products.php?id=" . $row['SP_MA'] . "' style='text-decoration: none; color: inherit;'>

                        <div style='border: 1px solid #ccc; padding: 10px; width: 150px; text-align: center;'>
                            <img src='" . $imagePath . "' alt='" . $row['SP_TEN'] . "'  style='width:100px;height:auto;'><br>
                            <strong>" . $row['SP_TEN'] . "</strong><br>
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
