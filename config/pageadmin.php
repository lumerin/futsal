<?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
      // Beranda
      case 'pelanggan':
        include '../pages/pelanggan.php';
        break;

      case 'user':
        include '../pages/user.php';
        break;

      case 'lapangan':
        include '../pages/lapangan.php';
        break;

      case 'properti':
        include '../pages/properti.php';
        break;

      case 'booking':
        include '../pages/booking.php';
        break;

      case 'inputBooking':
        include '../pages/booking/inputBooking.php';
        break;

      case 'strukBooking':
        include '../pages/booking/strukBooking.php';
        break;

      case 'pembayaran':
        include '../pages/pembayaran.php';
        break;

      case 'inputPembayaran':
        include '../pages/pembayaran/inputPembayaran.php';
        break;

      case 'strukPembayaran':
        include '../pages/pembayaran/strukPembayaran.php';
        break;

      case 'logout':
        $_SESSION['username'] = "";
        $_SESSION['akses'] = "";
        echo "<script>alert('Berhasil logout !');document.location.href='../'</script>";
        break;
    }
  } else {
    include '../pages/beranda.php';
  }
 ?>
