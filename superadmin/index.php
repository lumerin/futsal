<?php
  @session_start();
  @error_reporting(1);
  include "../config/lib.php";
  $perintah = new lib();

  if (empty($_SESSION['username']) || empty($_SESSION['akses'])) {
    $_SESSION['username'] = "";
    $_SESSION['akses'] = "";
		echo "<script>alert('Silahkan login terlebih dahulu !');document.location.href='../index.php'</script>";
	} else {
    if ($_SESSION['akses'] != "Super Admin") {
      $_SESSION['username'] = "";
      $_SESSION['akses'] = "";
      echo "<script>alert('Token eror, silahkan login ulang !');document.location.href='../index.php'</script>";
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>G.O.R. Sejahtera</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- select datatables -->
  <link rel="stylesheet" href="../plugins/datatables-select/css/select.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=logout" role="button">
          logout
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/futsal/superadmin" class="brand-link">
      <span class="brand-text font-weight-light">DASHBOARD G.O.R. Sejahtera</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a  class="d-block"><?php echo $_SESSION['username'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header text-grey">
            Kelola Data G.O.R. Sejahtera
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Kelola Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=pekerja" class="nav-link">
                  <i class="far fa-circle nav-icon text-blue"></i>
                  <p>Pekerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=properti" class="nav-link">
                  <i class="far fa-circle nav-icon text-blue"></i>
                  <p>Properti</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=lapangan" class="nav-link">
                  <i class="far fa-circle nav-icon text-blue"></i>
                  <p>Lapangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=pelanggan" class="nav-link">
                  <i class="far fa-circle nav-icon text-blue"></i>
                  <p>Pelanggan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=user" class="nav-link">
                  <i class="far fa-circle nav-icon text-blue"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laporan Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=laporanBooking" class="nav-link">
                  <i class="far fa-circle nav-icon text-blue"></i>
                  <p>Booking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=laporanPembayaran" class="nav-link">
                  <i class="far fa-circle nav-icon text-blue"></i>
                  <p>Pembayaran Lapangan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header text-grey">
            TRANSAKSI
          </li>
          <li class="nav-item">
            <a href="index.php?page=booking" class="nav-link">
              <i class="far fa-circle nav-icon text-success"></i>
              <p>
                Booking
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=pembayaran" class="nav-link">
              <i class="far fa-circle nav-icon text-success"></i>
              <p>
                Pembayaran Lapangan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content -->
  <?php include "../config/pagesuperadmin.php"; ?>
  <!-- /Content -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../plugins/datatables-select/js/dataTables.select.min.js"></script>
<script src="../plugins/datatables-select/js/select.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>
<script>
$(document).ready(function () {
  //Lihat password
  $('#lihatPassword').click(function(){
    if($(this).is(':checked')){
      $('#password').attr('type','text');
    }else{
      $('#password').attr('type','password');
    }
  });

  //Date picker
  $('#reservationdate1').datetimepicker({
      format: 'YYYY-MM-DD'
  });

  //Date picker
  $('#reservationdate2').datetimepicker({
      format: 'YYYY-MM-DD'
  });

  //Initialize Select2 Elements
  $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

  // Datatable pekerja
  var dataTablePekerja = $("#pekerja").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": true,
    buttons: [
      {
          extend: 'copyHtml5',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6 ]
          }
      },
      {
          extend: 'excelHtml5',
          autoFilter: true,
          title: 'Pekerja G.O.R. Sejahtera Futsal',
          filename: 'Daftar Pekerja G.O.R. Sejahtera',
          sheetName: 'Pekerja G.O.R. Sejahtera Futsal',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6 ]
          },
      },
      {
          extend: 'pdfHtml5',
          title: 'Pekerja G.O.R. Sejahtera Futsal',
          filename: 'Daftar Pekerja G.O.R. Sejahtera',
          pageSize: 'A4',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6 ]
          },
          customize : function(doc) {
              doc.content[1].table.widths = [ 'auto', '*','auto', '*', '*', '*', '*'];
              var rowCount = doc.content[1].table.body.length;
              for (i = 1; i < rowCount; i++) {
                doc.content[1].table.body[i][0].alignment = 'center';
                doc.content[1].table.body[i][3].alignment = 'right';
                doc.content[1].table.body[i][4].alignment = 'right';
              }
          }
      },
      {
          extend: 'print',
          title: 'Pekerja G.O.R. Sejahtera Futsal',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5,6 ]
          },
      }
    ],
    columnDefs: [
      {
        type: "num-fmt",
        targets: 0,
        className: 'text-center',
        appliesTo: 'print',
      },
      {
        type: "num-fmt",
        targets: 4,
        className: 'text-right',
        appliesTo: 'print'
      },
      {
        type: "num-fmt",
        targets: 5,
        className: 'text-right',
        appliesTo: 'print'
      },
      {
        type: 'phoneNumber',
        target: 4,
        appliesTo: 'excelHtml5'
      }
    ],
    select: true
  }).buttons().container().appendTo('#pekerja_wrapper .col-md-6:eq(0)');

  // Datatable properti
  var dataTableproperti = $("#properti").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": true,
    buttons: [
      {
          extend: 'copyHtml5',
          exportOptions: {
              columns: [ 0, 1, 2 ]
          }
      },
      {
        extend: 'excelHtml5',
        autoFilter: true,
        title: 'Properti G.O.R. Sejahtera Futsal',
        filename: 'Daftar Properti G.O.R. Sejahtera',
        sheetName: 'Properti G.O.R Sejahtera Futsal',
        exportOptions: {
            columns: [ 0, 1, 2 ]
        },
      },
      {
          extend: 'pdfHtml5',
          title: 'properti G.O.R. Sejahtera Futsal',
          filename: 'Daftar properti G.O.R. Sejahtera',
          pageSize: 'A4',
          exportOptions: {
              columns: [ 0, 1, 2 ]
          },
          customize : function(doc) {
              doc.content[1].table.widths = [ 100, '*', '*'];
              var rowCount = doc.content[1].table.body.length;
              for (i = 1; i < rowCount; i++) {
                doc.content[1].table.body[i][0].alignment = 'center';
                doc.content[1].table.body[i][2].alignment = 'right';
              }
          }
      },
      {
          extend: 'print',
          title: 'properti G.O.R. Sejahtera Futsal',
          exportOptions: {
              columns: [ 0, 1, 2 ]
          },
      }
    ],
    columnDefs: [
      {
          type: "num-fmt",
          targets: 0,
          className: 'text-center',
          appliesTo: 'print',
      },
      {
          type: "num-fmt",
          targets: 2,
          className: 'text-right',
          appliesTo: 'print'
      }
    ],
    select: true
  }).buttons().container().appendTo('#properti_wrapper .col-md-6:eq(0)');

  // Datatable lapangan
  var dataTableLapangan = $("#lapangan").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": true,
    buttons: [
      {
          extend: 'copyHtml5',
          exportOptions: {
              columns: [ 0, 1, 2]
          }
      },
      {
          extend: 'excelHtml5',
          autoFilter: true,
          title: 'Lapangan G.O.R. Sejahtera Futsal',
          filename: 'Daftar Lapangan G.O.R. Sejahtera',
          sheetName: 'Lapangan G.O.R Sejahtera Futsal',
          exportOptions: {
              columns: [ 0, 1, 2]
          },
      },
      {
          extend: 'pdfHtml5',
          title: 'Lapangan G.O.R. Sejahtera Futsal',
          filename: 'Daftar Lapangan G.O.R. Sejahtera',
          pageSize: 'A4',
          exportOptions: {
              columns: [ 0, 1, 2]
          },
          customize : function(doc) {
              doc.content[1].table.widths = [ 'auto', '*', '*'];
              var rowCount = doc.content[1].table.body.length;
              for (i = 1; i < rowCount; i++) {
                doc.content[1].table.body[i][0].alignment = 'center';
                doc.content[1].table.body[i][2].alignment = 'right';
              }
          }
      },
      {
          extend: 'print',
          title: 'Lapangan G.O.R. Sejahtera Futsal',
          exportOptions: {
              columns: [ 0, 1, 2]
          },
      }
    ],
    columnDefs: [
      {
          type: "num-fmt",
          targets: 0,
          className: 'text-center',
          appliesTo: 'print',
      },
      {
          type: "num-fmt",
          targets: 2,
          className: 'text-right',
          appliesTo: 'print'
      }
    ],
    select: true
    }).buttons().container().appendTo('#lapangan_wrapper .col-md-6:eq(0)');

  // Datatable pelanggan
  var dataTablepelanggan = $("#pelanggan").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": true,
    buttons: [
      {
          extend: 'copyHtml5',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5]
          }
      },
      {
          extend: 'excelHtml5',
          autoFilter: true,
          title: 'pelanggan G.O.R. Sejahtera Futsal',
          filename: 'Daftar pelanggan G.O.R. Sejahtera',
          sheetName: 'pelanggan',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5]
          },
      },
      {
          extend: 'pdfHtml5',
          title: 'pelanggan G.O.R. Sejahtera Futsal',
          filename: 'Daftar pelanggan G.O.R. Sejahtera',
          pageSize: 'A4',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5]
          },
          customize : function(doc) {
                doc.content[1].table.widths = [ 'auto', '*', '*', '*', '*', '*'];
                var rowCount = doc.content[1].table.body.length;
                for (i = 1; i < rowCount; i++) {
                  doc.content[1].table.body[i][0].alignment = 'center';
                  doc.content[1].table.body[i][3].alignment = 'right';
                  doc.content[1].table.body[i][4].alignment = 'right';
                }
            }
      },
      {
          extend: 'print',
          title: 'pelanggan G.O.R. Sejahtera Futsal',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5]
          },
      }
    ],
    columnDefs: [
      {
        type: "num-fmt",
        targets: 0,
        className: 'text-center',
        appliesTo: 'print',
      },
      {
        type: "num-fmt",
        targets: 4,
        className: 'text-right',
        appliesTo: 'print'
    },
      {
        type: "num-fmt",
        targets: 5,
        className: 'text-right',
        appliesTo: 'print'
    },
    {
      type: 'phoneNumber',
      target: 5,
      appliesTo: 'excelHtml5'
    }
  ],
    select: true
  }).buttons().container().appendTo('#pelanggan_wrapper .col-md-6:eq(0)');

  // Datatable user
  var dataTableUser = $("#user").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": true,
    buttons: [
      {
          extend: 'copyHtml5',
          exportOptions: {
              columns: [ 0, 1, 2, 3 ]
          }
      },
      {
          extend: 'excelHtml5',
          autoFilter: true,
          title: 'Pekerja G.O.R. Sejahtera Futsal',
          filename: 'Daftar User G.O.R. Sejahtera',
          sheetName: 'User G.O.R. Sejahtera Futsal',
          exportOptions: {
              columns: [ 0, 1, 2, 3]
          },
      },
      {
          extend: 'pdfHtml5',
          title: 'User G.O.R. Sejahtera Futsal',
          filename: 'Daftar User G.O.R. Sejahtera',
          pageSize: 'A4',
          exportOptions: {
              columns: [ 0, 1, 2, 3 ]
          },
          customize : function(doc) {
              doc.content[1].table.widths = [ 'auto', '*', '*', '*'];
              var rowCount = doc.content[1].table.body.length;
              for (i = 1; i < rowCount; i++) {
                doc.content[1].table.body[i][0].alignment = 'center';
                doc.content[1].table.body[i][1].alignment = 'center';
                doc.content[1].table.body[i][2].alignment = 'center';
                doc.content[1].table.body[i][3].alignment = 'center';
              }
          }
      },
      {
          extend: 'print',
          title: 'User G.O.R. Sejahtera Futsal',
          exportOptions: {
              columns: [ 0, 1, 2, 3 ]
          },
      }
    ],
    select: true
  }).buttons().container().appendTo('#user_wrapper .col-md-6:eq(0)');

  // Datatable booking
  var dataTableBooking = $("#booking").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": true
  });

  // Datatable laporan booking
  var dataTablelaporanBooking = $("#laporanBooking").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": true,
    buttons: [
      {
          extend: 'copyHtml5',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
          }
      },
      {
          extend: 'excelHtml5',
          autoFilter: true,
          title: 'Laporan Booking G.O.R. Sejahtera Futsal',
          filename: 'Laporan Booking G.O.R. Sejahtera Futsal',
          sheetName: 'Laporan Booking G.O.R. Sejahtera Futsal',
          messageTop: 'Dari tanggal ' + '<?php echo $_POST[tgl_awal] ?>' + ' sampai dengan tanggal ' + '<?php echo $_POST[tgl_akhir] ?>',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
          },
      },
      {
          extend: 'pdfHtml5',
          title: 'Laporan Booking G.O.R. Sejahtera Futsal',
          filename: 'Laporan Booking G.O.R. Sejahtera Futsal',
          pageSize: 'legal',
          orientation: 'landscape',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
          },
          customize : function(doc) {
                doc.content[1].table.widths = [ 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto' ];
                var rowCount = doc.content[1].table.body.length;
            },
      },
      {
          extend: 'print',
          title: 'Laporan Booking G.O.R. Sejahtera Futsal',
          orientation: 'landscape',
          messageTop: 'Dari tanggal ' + '<?php echo $_POST[tgl_awal] ?>' + ' sampai dengan tanggal ' + '<?php echo $_POST[tgl_akhir] ?>',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
          },
      }
    ],
    columnDefs: [
      {
        type: "num-fmt",
        targets: 0,
        className: 'text-center',
        appliesTo: 'print',
      },
      {
        type: "num-fmt",
        targets: 3,
        className: 'text-right',
        appliesTo: 'print'
    },
      {
        type: "num-fmt",
        targets: 4,
        className: 'text-right',
        appliesTo: 'print'
    },
    {
      type: 'phoneNumber',
      target: 4,
      appliesTo: 'excelHtml5'
    }
  ],
    select: true
  }).buttons().container().appendTo('#laporanBooking_wrapper .col-md-6:eq(0)');

  // Datatable laporan booking
  var dataTablelaporanPembayaran = $("#laporanPembayaran").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": true,
    buttons: [
      {
          extend: 'copyHtml5',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14 ]
          }
      },
      {
          extend: 'excelHtml5',
          autoFilter: true,
          title: 'Laporan Pembayaran G.O.R. Sejahtera Futsal',
          filename: 'Laporan Pembayaran G.O.R. Sejahtera Futsal',
          sheetName: 'Laporan Pembayaran G.O.R. Sejahtera Futsal',
          messageTop: 'Dari tanggal ' + '<?php echo $_POST[tgl_awal] ?>' + ' sampai dengan tanggal ' + '<?php echo $_POST[tgl_akhir] ?>',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14 ]
          },
      },
      {
          extend: 'pdfHtml5',
          title: 'Laporan Pembayaran G.O.R. Sejahtera Futsal',
          filename: 'Laporan Pembayaran G.O.R. Sejahtera Futsal',
          pageSize: 'legal',
          orientation: 'landscape',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14 ]
          },
          customize : function(doc) {
                doc.content[1].table.widths = [ 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto' ];
                var rowCount = doc.content[1].table.body.length;
            },
      },
      {
          extend: 'print',
          title: 'Laporan Pembayaran G.O.R. Sejahtera Futsal',
          orientation: 'landscape',
          messageTop: 'Dari tanggal ' + '<?php echo $_POST[tgl_awal] ?>' + ' sampai dengan tanggal ' + '<?php echo $_POST[tgl_akhir] ?>',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
          },
      }
    ],
    columnDefs: [
      {
        type: "num-fmt",
        targets: 0,
        className: 'text-center',
        appliesTo: 'print',
      },
      {
        type: "num-fmt",
        targets: 3,
        className: 'text-right',
        appliesTo: 'print'
    },
      {
        type: "num-fmt",
        targets: 4,
        className: 'text-right',
        appliesTo: 'print'
    },
    {
      type: 'phoneNumber',
      target: 4,
      appliesTo: 'excelHtml5'
    }
  ],
    select: true
  }).buttons().container().appendTo('#laporanPembayaran_wrapper .col-md-6:eq(0)');

  // Datetime
  var datetime =  $('#reservationdatetime').datetimepicker({
    icons: {
      time: 'far fa-clock'
    },
      format: 'YYYY-MM-DD HH:mm:ss'
  });

});

$("#pelangganBooking").on("change", function(){

  // ambil nilai
  var nama = $("#pelangganBooking option:selected").attr("nama");
  var noKtp = $("#pelangganBooking option:selected").attr("noKtp");
  var noHp = $("#pelangganBooking option:selected").attr("noHp");
  // pindahkan nilai ke input
  $("#nama").val(nama);
  $("#noKtp").val(noKtp);
  $("#noHp").val(noHp);
});

$("#pelangganBayar").on("change", function(){

  // ambil nilai
  var noKtp = $("#pelangganBayar option:selected").attr("noKtp");
  var noHp = $("#pelangganBayar option:selected").attr("noHp");
  // pindahkan nilai ke input
  $("#noKtp").val(noKtp);
  $("#noHp").val(noHp);
});

$("#hargaLapangan").on("change", function(){

  // ambil nilai
  var harga = $("#hargaLapangan option:selected").attr("harga");
  var durasi = $("#durasi").val();
  var total = harga * durasi;
  // pindahkan nilai ke input
  $("#totalBayar").val(total);

});

$("#durasi").on("keyup", function(){

  // ambil nilai
  var harga = $("#hargaLapangan option:selected").attr("harga");
  var durasi = $("#durasi").val();
  var total = harga * durasi;
  // pindahkan nilai ke input
  $("#totalBayar").val(total);

});

$("#durasi").on("change", function(){

  // ambil nilai
  var harga = $("#hargaLapangan option:selected").attr("harga");
  var durasi = $("#durasi").val();
  var total = harga * durasi;
  // pindahkan nilai ke input
  $("#totalBayar").val(total);

});

</script>
</body>
</html>
