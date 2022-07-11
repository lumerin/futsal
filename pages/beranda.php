<?php
  $properti = $perintah->tampiljumlah("tb_properti", "SUM(stok)", "" );
  $pelanggan = $perintah->tampiljumlah("tb_pelanggan", "count(id)", "");
  $booking = $perintah->tampiljumlah("tb_booking", "count(id)", "WHERE tgl_sewa > now()");
  $pembayaran = $perintah->tampiljumlah("tb_pembayaran", "count(id)", "");
 ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
              <h3><?php if (!$properti[0][0]) {
                echo 0;
              } else {
                echo $properti[0][0];
              } ?></h3>

              <p>Properti</p>
            </div>
            <div class="icon">
              <i class="fa fa-clipboard-list"></i>
            </div>
            <a href="index.php?page=properti" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php echo $pelanggan[0][0]; ?></h3>

              <p>Pelanggan</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="index.php?page=pelanggan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $booking[0][0]; ?></h3>

              <p>Booking</p>
            </div>
            <div class="icon">
              <i class="far fa-calendar-check"></i>
            </div>
            <a href="index.php?page=booking" class=" text-white small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $pembayaran[0][0]; ?></h3>

              <p>Pembayaran</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-invoice-dollar"></i>
            </div>
            <a href="index.php?page=pembayaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">

      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
