<!doctype html>
<html lang="en">
<head>
<?php include "head.php" ?>
<link rel="icon" href="./img/icon.png" type="image/x-icon/">

<?php
include "header.php";
?>
</head>
<body>
    <!-- Notification Section -->
    <div id="notification-container" style="display: none;">
        <p id="notification" style="color: green;"></p>
    </div>

    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo "<script>document.getElementById('notification').innerText = 'Lời nhắn của bạn đã được gửi thành công!';</script>";
            echo "<script>document.getElementById('notification-container').style.display = 'flex';</script>";
        } elseif ($_GET['status'] == 'error') {
            echo "<script>document.getElementById('notification').innerText = 'Đã xảy ra lỗi, vui lòng thử lại!';</script>";
            echo "<script>document.getElementById('notification-container').style.display = 'flex';</script>";
        }
    }
    ?>

    <!-- Notification Styles -->
    <style>
        #notification-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000; /* Đảm bảo nó hiển thị trên tất cả các phần tử khác */
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

    <!-- Contact Section -->
    <div id="contact-section">
        <style>

            #contact-section .container {
                width: 80%;
                margin: 0 auto;
                display: flex;
                flex-direction: column; /* Sắp xếp theo chiều dọc */
                align-items: center; /* Căn giữa các phần tử */
                padding: 20px;
            }
            #contact-section .contact-form {
                width: 100%; /* Chiều rộng đầy đủ */
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                margin-bottom: 30px; /* Thêm khoảng cách với phần bên dưới */
            }
            #contact-section .contact-form h2 {
                color: #b02b2b;
                font-size: 24px;
                margin-bottom: 10px;
            }
            #contact-section .contact-form p {
                color: #777;
                margin-bottom: 20px;
            }
            #contact-section .contact-form input[type="text"],
            #contact-section .contact-form input[type="email"],
            #contact-section .contact-form textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #eaeaea;
                border-radius: 5px;
                background-color: #fdf9f4;
            }
            

            #contact-section .contact-form button {
                background-color: #b02b2b;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            #contact-section .contact-form button:hover {
                background-color: #900;
            }
            #contact-section .contact-info {
                width: 100%; /* Chiều rộng đầy đủ */
                text-align: center; /* Căn giữa văn bản */
            }
            #contact-section .contact-info h3 {
                color: #b02b2b;
            }
            #contact-section .contact-info p {
                margin: 10px 0;
                color: #555;
            }
            #contact-section .contact-info .icon {
                font-size: 20px;
                margin-right: 10px;
                color: #b02b2b;
            }
            #contact-section .map {
                width: 100%; /* Chiều rộng đầy đủ */
                border: none;
                height: 400px;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }


           
        </style>
        <style>
    body2 {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 100%;
      height: 60vh;
    }

    .whiteboard-container {
      position: relative;
      width: 100%;
      height: 40vh;
      background: #ffffff;
      border: 2px solid #000;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden; /* Đảm bảo bong bóng không tràn ra ngoài */
    }

    .message-bubble {
      position: absolute;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 14px;
      font-weight: bold;
      color: #000;
      white-space: nowrap;
      pointer-events: none; /* Không bị click */
    }

    #message-form {
      margin-top: 20px;
      display: flex;
      gap: 10px;
    }

    #message-input {
      padding: 10px;
      font-size: 16px;
      width: 300px;
    }

    #message-form button {
      padding: 10px 20px;
      background-color: #000;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    #message-form button:hover {
      background-color: #333;
    }


  </style>

        <div class="container">
            <div class="contact-form">
                <h2>Liên Hệ Với Chúng Tôi</h2>
                <p>Nếu bạn cần thêm thông tin hoặc trao đổi công việc xin vui lòng liên hệ với chúng tôi qua email hoặc số điện thoại được cung cấp bên dưới.</p>
                <form action="contact_submit.php" method="post">
                    <input type="text" name="name" placeholder="Tên của bạn" required>
                    <input type="email" name="email" placeholder="Email của bạn" required>
                    <textarea name="message" rows="5" placeholder="Lời nhắn của bạn" required></textarea>
                    <button type="submit">Gửi</button>
                </form>
            </div>

            <div class="contact-info">
                <h3>Thông Tin Liên Hệ</h3>
                <p><i class="icon">&#x1F4DE;</i> Điện thoại: 0123 456 789</p>
                <p><i class="icon">&#x2709;</i> Email: janasportsman@gmail.com</p>
            </div>

            <iframe 
    class="map"
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.912812247909!2d105.7469!3d10.0452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0880c5bdbff31%3A0x8d98ef539b2f9ae8!2sCan%20Tho!5e0!3m2!1sen!2sus!4v1608573402675!5m2!1sen!2sus"
    allowfullscreen=""
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
</iframe>
<!-- <body2>
    <h1>Leave a Message</h1>
  <div class="whiteboard-container" id="message-bubbles"></div>
  <form id="message-form">
    <input type="text" id="message-input" placeholder="Type your message here..." maxlength="200">
    <button type="submit">Send</button>
  </form> -->

  <!--  <script>

    const messageForm = document.getElementById('message-form');
    const messageInput = document.getElementById('message-input');
    const messageBubbles = document.getElementById('message-bubbles');

    // Randomize position, size, and color
    const getRandomValue = (min, max) => Math.random() * (max - min) + min;
    const colors = ['#FFB7B2', '#FF9AA2', '#B5EAD7', '#E2F0CB', '#FFDAB9'];

    function createBubble(message) {
      const bubble = document.createElement('div');
      bubble.classList.add('message-bubble');
      bubble.textContent = message;

      const size = getRandomValue(50, 100);
      bubble.style.width = `${size}px`;
      bubble.style.height = `${size}px`;
      bubble.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
      bubble.style.left = `${getRandomValue(0, messageBubbles.offsetWidth - size)}px`;
      bubble.style.top = `${getRandomValue(0, messageBubbles.offsetHeight - size)}px`;

      messageBubbles.appendChild(bubble);

      // Animate bubble (giữ bong bóng di chuyển nhẹ trong khu vực bảng)
      setInterval(() => {
        const x = getRandomValue(-10, 10);
        const y = getRandomValue(-10, 10);
        bubble.style.transform = `translate(${x}px, ${y}px)`;
      }, 2000); // Cứ sau 2 giây sẽ thay đổi vị trí nhẹ
    }

    messageForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const message = messageInput.value.trim();
      if (message) {
        createBubble(message);
        messageInput.value = '';
      }
    });
  </script> -->
  <!-- Bubble Chat HTML -->


</body2>
<!-- <div class="bubble-container" id="bubble-container">
    <div class="bubble">
        <span class="bubble-close" id="bubble-close">&times;</span>
        <p id="bubble-message">Lời nhắn của bạn đã được gửi thành công!</p>
    </div>
</div> -->
        </div>
    </div>

    

    <?php 
    include "footer.php";
    ?>

    <!-- JS Scripts -->
   
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nivo.slider.js"></script>
    <script src="js/jqueryui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script>
        new WOW().init();
    </script>
    
    <script src="js/main.js"></script>
    
  <script>
    // Hiển thị bong bóng khi có thông báo
    const bubbleContainer = document.getElementById('bubble-container');
    const bubbleClose = document.getElementById('bubble-close');
    const bubbleMessage = document.getElementById('bubble-message');

    // Kiểm tra trạng thái từ URL
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    // Kiểm tra và lưu trạng thái thông báo vào localStorage
    if (status) {
        if (status === 'success') {
            bubbleMessage.innerText = 'Lời nhắn của bạn đã được gửi thành công!';
        } else if (status === 'error') {
            bubbleMessage.innerText = 'Đã xảy ra lỗi, vui lòng thử lại!';
        }
        localStorage.setItem('bubbleMessage', bubbleMessage.innerText);  // Lưu trạng thái
        localStorage.setItem('bubbleStatus', 'visible');  // Đánh dấu thông báo đã hiển thị
        bubbleContainer.style.display = 'block';
    } else {
        // Kiểm tra xem có thông báo đã lưu trong localStorage không
        const savedMessage = localStorage.getItem('bubbleMessage');
        const savedStatus = localStorage.getItem('bubbleStatus');
        if (savedStatus === 'visible') {
            bubbleMessage.innerText = savedMessage;
            bubbleContainer.style.display = 'block';
        }
    }

    // Đóng bong bóng khi nhấn vào nút
    bubbleClose.addEventListener('click', () => {
        bubbleContainer.style.display = 'none';
        localStorage.removeItem('bubbleMessage');  // Xóa trạng thái thông báo khi đóng
        localStorage.removeItem('bubbleStatus');
    });
</script>




</body>

</html>
