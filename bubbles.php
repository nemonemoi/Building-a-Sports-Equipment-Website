<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message Bubbles</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .whiteboard-container {
      position: relative;
      width: 80%;
      height: 60vh;
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
</head>
<body>
  <h1>Leave a Message</h1>
  <div class="whiteboard-container" id="message-bubbles"></div>
  <form id="message-form">
    <input type="text" id="message-input" placeholder="Type your message here..." maxlength="200">
    <button type="submit">Send</button>
  </form>

  <script>
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
  </script>
</body>
</html>
