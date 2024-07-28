<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="css/stylee.css" />
  <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
  <script src="main.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
  <div class="boxcenter">
    <header>
      <div class="row mb header">
        <h1>SIÊU THỊ TRỰC TUYẾN</h1>
      </div>
      <div class="row mb menu">
        <ul>
          <li><a href="index.php">Trang chủ</a></li>
          <?php if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 1) { ?>
              <li><a href="index.php?act=admin_bl">QL Bình luận</a></li>
              <li><a href="index.php?act=dstaikhoan">QL Tài khoản</a></li>
              <li><a href="?act=thongke">BIỂU ĐỒ</a></li>
            <?php    } else { ?>
              <li><a href="">Liên hệ</a></li>
              <li><a href="">Blog</a></li>
            <?php    }
          } else { ?>
            <li><a href="">Giới thiệu</a></li>
            <li><a href="">Hỏi đáp</a></li>
            <li><a href="">Liên hệ</a></li>
            <li><a href="">Blog</a></li>
          <?php  }
          ?>
        </ul>
        <div class="icon">
          <form action="index.php?act=search" method="post">
            <input type="text" name="key" placeholder="Search...">
            <button name="keyw" value="search" type="submit"><i class="fas fa-search"></i></button>
          </form>
          <a class="cart" href="index.php?act=list_Cart"><i class="fas fa-shopping-cart"><span id="slsp"><?= (isset($_SESSION['iduser']) && isset($_SESSION['total_cart'])) ? $_SESSION['total_cart'] : 0 ?></span></i></a>
          <a class="user" href="index.php?act=tt_user"><i class="fas fa-user"></i></a>
        </div>
      </div>
      <?php
      if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == '1') {  ?>
          <div class="qtv">
            <i class="fas fa-cog"></i> <span class="qt"><a href="index.php?act=danhsach">Quản Trị Viên</a></span>
          </div>
      <?php }
      }
      ?>
    </header>