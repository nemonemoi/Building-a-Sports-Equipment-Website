<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Box</title>
    <style>
        /* Chat Icon */
        #chat-icon {
            position: fixed;
            bottom: 90px; /* Khoảng cách từ đáy */
            height: 17%;
            width: 7%;
            right: 5px; /* Khoảng cách từ bên phải */
            cursor: pointer;
            animation: bounce 1s infinite; /* Thêm hiệu ứng nhảy lên xuống */
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        /* Chat Container */
        #chat-container {
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 320px;
            height: 400px;
            background-color: white;
            color: white;
            border-radius: 10px;
            display: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            flex-direction: column;
            overflow: hidden;
        }


        #header {
            background-color: #BB0000; /* Màu đỏ tối hơn */
            padding: 10px;
            text-align: center;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            position: relative;
        }

        #header button {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        #chatbox {
            flex-grow: 1;
            padding: 10px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        #messageInput {
            padding: 10px;
            border: none;
            outline: none;
            width: calc(100% - 20px);
            background-color: #f5f5f5;
            border-top: 2px solid #4b0014;
            color: black;
        }

        /* Tin nhắn */
        .message {
            max-width: 70%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
            word-wrap: break-word;
        }

        .user-message {
            align-self: flex-end !important;
            background-color: #ffcccb; /* Nền nhạt cho tin nhắn khách hàng */
            color: black;
            margin-left: auto; /* Căn sang bên phải */
        }

        .bot-message {
            align-self: flex-start !important;
            background-color: white; /* Nền đỏ tối */
            color: black;
            border: 1px solid black; 
        }

   .product-container {
    display: flex;
    gap: 5px; /* Khoảng cách giữa các sản phẩm */
    justify-content: space-between; /* Căn đều sản phẩm */
    padding: 5px;
    overflow-y: hidden; /* Không cần thanh cuộn ngang dọc nếu sản phẩm gọn */
}

.product {
    flex: 0 0 auto; /* Không co dãn */
    width: 90px; /* Chiều rộng sản phẩm */
    text-align: center;
    border: 1px solid #ccc;
    padding: 5px;
    box-sizing: border-box; /* Đảm bảo padding không làm tràn */
}

.product img {
    width: 60px; /* Chiều rộng cố định của ảnh */
    height: auto;
    margin-bottom: 5px;
}

.product strong {
    font-size: 11px; /* Kích thước chữ nhỏ */
    display: block; /* Tách thành một khối */
    line-height: 1.1; /* Giảm chiều cao dòng chữ */
    max-height: 26px; /* Đảm bảo hiển thị 2 dòng */
    overflow: hidden; /* Ẩn nội dung dư */
    text-overflow: ellipsis; /* Dấu "..." nếu vượt quá */
    margin-bottom: 2px; /* Khoảng cách nhỏ hơn giữa tên và giá */
}

.product span {
    font-size: 10px; /* Giữ font nhỏ */
    color: #333; /* Màu giá */
    font-weight: bold; /* Nổi bật giá */
    display: block; /* Đảm bảo thẳng hàng */
    margin-top: -10px; /* Loại bỏ khoảng cách phía trên */
}

        /* Ô nhập tin nhắn */
        #messageInput {
            padding: 10px;
            border: none;
            outline: none;
            width: 100%; /* Đảm bảo chiều rộng đầy đủ */
            background-color: #f5f5f5;
            border-top: 2px solid #4b0014;
            color: black;
            box-sizing: border-box; /* Đảm bảo padding không làm tràn khung */
        }
    </style>
</head>

<body>
<!-- Icon chat -->
<div id="chat-icon" onclick="toggleChat()">
    <img src="./img/chat.png" alt="Chat Icon" >
</div>

<!-- Khung chat -->
<div id="chat-container">
    <div id="header">
        Trò chuyện với chúng tôi
        <button onclick="toggleChat()">X</button>
    </div>

    <div id="chatbox">
        <div id="chatContent"></div>
    </div>
    <input type="text" id="messageInput" placeholder="Nhập tin nhắn..." onkeypress="if(event.key === 'Enter') sendMessage()">
</div>

<script>
    function toggleChat() {
        var chatContainer = document.getElementById('chat-container');
        var chatIcon = document.getElementById('chat-icon');
        var chatContent = document.getElementById('chatContent');
        var defaultMessage = `<div class="message bot-message">Xin chào, bạn cần tôi giúp gì?</div>`;

        if (chatContainer.style.display === "none" || chatContainer.style.display === "") {
            chatContainer.style.display = "flex"; // Hiện khung chat
            chatIcon.style.display = "none";     // Ẩn icon chat

            // Hiển thị tin nhắn chào mặc định nếu chưa có
            if (chatContent.innerHTML.trim() === '') {
                chatContent.innerHTML += defaultMessage;
            }
        } else {
            chatContainer.style.display = "none"; // Ẩn khung chat
            chatIcon.style.display = "block";    // Hiện icon chat
        }
    }

    function sendMessage() {
        var messageInput = document.getElementById('messageInput');
        var message = messageInput.value;
        if (message.trim() !== '') {
            // Thêm tin nhắn của khách hàng vào khung chat
            var chatContent = document.getElementById('chatContent');
            var userMessage = `<div class="message user-message">${message}</div>`;
            chatContent.innerHTML += userMessage;

            // Gửi tin nhắn tới máy chủ
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "process_chat.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    

                    // Nếu phản hồi chứa đề xuất sản phẩm, hiển thị sản phẩm theo hàng ngang
                    if (response.product_list && response.product_list.length > 0) {
                        var productHtml = '<div class="message bot-message product-container">';
                        response.product_list.forEach(product => {
                            productHtml += `
                                <div class="product">
                                    <img src="${product.image}" alt="${product.name}" style="width: 100%; height: 100%; object-fit: cover;">
                                    <p>${product.name}</p>
                                    <p>${product.price}</p>
                                </div>
                            `;
                        });
                        productHtml += '</div>';
                        chatContent.innerHTML += productHtml;
                    } else {
                        var botMessage = `<div class="message bot-message">${response.bot_message}</div>`;
                        chatContent.innerHTML += botMessage;
                    }

                    // Tự động cuộn xuống cuối khi có tin nhắn mới
                    chatContent.scrollTop = chatContent.scrollHeight;
                }
            };
            xhr.send("message=" + encodeURIComponent(message));

            // Xóa nội dung input sau khi gửi
            messageInput.value = '';
        }
    }
</script>
</body>
</html>
