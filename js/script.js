

// script.js

// Lấy phần tử nút từ DOM
const toggleButton = document.getElementById('toggleButton');

// Kiểm tra xem chế độ đã được lưu trong localStorage hay chưa
if (localStorage.getItem('dark-mode') === 'true') {
    document.body.classList.add('dark-mode');
    toggleButton.innerHTML = '<b>Chuyển sang chế độ 🌞</b>'; // Thêm emoji Mặt trời và làm chữ đậm
}

// Cập nhật localStorage khi chế độ thay đổi
toggleButton.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');

    if (document.body.classList.contains('dark-mode')) {
        toggleButton.innerHTML = '<b>Chuyển sang chế độ 🌞</b>'; // Thêm emoji Mặt trời và làm chữ đậm
        localStorage.setItem('dark-mode', 'true');
    } else {
        toggleButton.innerHTML = '<b>Chuyển sang chế độ 🌜</b>'; // Thêm emoji Mặt trăng và làm chữ đậm
        localStorage.setItem('dark-mode', 'false');
    }
});
