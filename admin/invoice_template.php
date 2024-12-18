<?php
function generateInvoiceHTML($data) {
    ob_start();
    ?>
    <html>
    <head>
        <style>
            .invoice-box {
                max-width: 800px;
                margin: auto;
                padding: 30px;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                font-size: 16px;
                line-height: 24px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #555;
            }
            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
            }
            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }
            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }
            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }
            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
                color: #333;
            }
            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }
            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }
            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }
            .invoice-box table tr.item td {
                border-bottom: 1px solid #eee;
            }
            .invoice-box table tr.item.last td {
                border-bottom: none;
            }
            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }
        </style>
    </head>
    <body> 
        <div class="invoice-box"> 
            <!-- Đoạn văn bản cảm ơn và xác nhận đơn hàng --> 
            <div style="text-align: center; margin-bottom: 20px;"> 
                <h2>Cảm ơn quý khách đã mua hàng tại じゃな, Sportsman!</h2> 
                <p>Đơn hàng của quý khách đã được xác nhận. Dưới đây là thông tin chi tiết về hóa đơn của quý khách:</p> 
            </div> 
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    HOÁ ĐƠN
                                </td>
                                <td>
                                    Mã đơn: <?php echo $data['mahd']; ?><br>
                                    Ngày đặt: <?php echo date('d/m/Y', strtotime($data['ngay'])); ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    <h3 style="font-weight: bold;">Thông tin khách hàng:</h3>
                                    Tên: <?php echo $data['tenkh']; ?><br>
                                    Email: <?php echo $data['mailkh']; ?><br>
                                    SĐT: <?php echo $data['sdtkh']; ?><br>
                                    Địa chỉ giao: <?php echo $data['diachi_giao'] ?: 'Không có thông tin địa chỉ giao hàng.'; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="heading">
                    <td>
                        Tên SP
                    </td>
                    <td>
                        SL - ĐG - T.Tiền
                    </td>
                </tr>
                <?php foreach ($data['sanpham'] as $item): ?>
                <tr class="item">
                    <td style="font-weight: bold;">
                        <?php echo $item['tensp']; ?>
                    </td>
                    <td>
                        <?php echo $item['slsp']; ?> x <?php echo number_format($item['giasp'], 0); ?> đ - <?php echo number_format($item['tongtien'], 0); ?> đ
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr class="total">
                    <td></td>
                    <td style="font-weight: bold;">
                        Thành tiền: <?php echo number_format($data['thanhtien'], 0); ?> đ
                    </td>
                </tr>
                <tr class="total">
                    <td></td>
                    <td  style="font-weight: bold;">
                        Phí vận chuyển: <?php echo number_format($data['phivanchuyen'], 0); ?> đ
                    </td>
                </tr>
                <tr class="total">
                    <td></td>
                    <td style="font-weight: bold; color: indianred;">
                        Tổng tiền: <?php echo number_format($data['tongtien'], 0); ?> đ
                    </td>
                </tr>
            </table>
        </div>
    </body>
    </html>
    <?php
    return ob_get_clean();
}
?>
