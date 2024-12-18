<?php
  require 'connect.php';
?>

<style>
  .btn-outline-white {
    border: 1px solid white; /* Đặt viền màu trắng */
    color: white; /* Đặt màu chữ trắng để đồng bộ */
  }
</style>

<ul class="navbar-nav justify-content-end">
  <li class="nav-item d-flex align-items-center mb-4 me-4">
    <div class="icon icon-shape text-center rounded-circle">
      <img src="../assets/img/staff_img/<?php echo $_SESSION["avt"]; ?>" class="rounded-circle avatar avatar-xl" alt='user'>
    </div>
  </li>
  <li class="nav-item d-flex align-items-center mt-sm-1 ms-3">
    <nav class="mt-sm-1" aria-label="breadcrumb">
      <h7 class="text-dark text-bold mb-0">Xin chào,</h7>
      <h6 class="font-weight-bolder text-white mt-n1"><?php echo $_SESSION["name"]; ?></h6>
      <a href="log_out.php" class="btn btn-outline-white text-white font-weight-bold px-2 mt-n1 py-1">
        <span class="d-sm-inline d-none me-sm-1">Đăng xuất</span>
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </nav>
  </li>

  <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
      <div class="sidenav-toggler-inner">
        <i class="sidenav-toggler-line bg-white"></i>
        <i class="sidenav-toggler-line bg-white"></i>
        <i class="sidenav-toggler-line bg-white"></i>
      </div>
    </a>
  </li>
</ul>
