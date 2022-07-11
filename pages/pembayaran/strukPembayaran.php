<?php
  include "../../config/lib.php";
  $perintah = new lib();
  $table = "tb_pembayaran";
  $where = "WHERE tb_pembayaran.id = '$_GET[id]'";
  $data = "tb_pembayaran.id as id_pembayaran, tb_pembayaran.id_booking, tb_pembayaran.id_pelanggan, tb_pelanggan.nama as nama_pelanggan, tb_pelanggan.alamat as alamat_pelanggan, tb_pelanggan.nohp as nohp_pelanggan, tb_pembayaran.id_lapangan, tb_lapangan.nama as nama_lapangan, tb_lapangan.harga as harga_lapangan, tb_pembayaran.jam_sewa, tb_pembayaran.durasi_sewa, tb_pembayaran.total_bayar, tb_pembayaran.tgl_pembayaran";
  $inner = "INNER JOIN tb_pelanggan ON tb_pembayaran.id_pelanggan = tb_pelanggan.id INNER JOIN tb_lapangan ON tb_pembayaran.id_lapangan = tb_lapangan.id";
  $id = "tgl_pembayaran";
  $data = $perintah->carikan($table, $data, $inner, $where, $id);
  $dp = $perintah->edit("tb_booking", "id = '$data[id_booking]'");

  // $data = $perintah->edit("pembayaran");
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
   <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="../../assets/plugins/jqvmap/jqvmap.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <!-- select datatables -->
   <link rel="stylesheet" href="../../plugins/datatables-select/css/select.bootstrap4.min.css">
   <!-- Select2 -->
   <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
   <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="../../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="../../assets/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="../../assets/plugins/summernote/summernote-bs4.min.css">
   <style>


   .table > tbody > tr > .no-line {
       border-top: none;
   }

   .table > thead > tr > .no-line {
       border-top: none;
   }

   .table > tbody > tr > .thick-line {
       border-top: 2px solid;
   }


   </style>
 </head>
<body class="hold-transition sidebar-mini">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
              <div>
              <h2>Nota</h2>
              </div>
              <div>
                <h3>Order # <?php echo $_GET['id'] ?></h3>
              </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <address>
                    <strong>Data Pelanggan :</strong><br>
                        Nama lengkap : <?php echo $data['nama_pelanggan'] ?><br>
                        Alamat : <?php echo $data['alamat_pelanggan'] ?><br>
                        Nomor HP : <?php echo $data['nohp_pelanggan'] ?><br>
                    </address>
                </div>
                <div class="col-md-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                          <?php echo $data['tgl_pembayaran'] ?><br><br>
                        </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default border">
                <div class="card-header">
                    <h3 class="card-title"><strong>Order summary</strong></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td class="no-line"><strong>Nama Lapangan</strong></td>
                                    <td class="text-center no-line"><strong>Booking</strong></td>
                                    <td class="text-center no-line"><strong>Jam Pakai</strong></td>
                                    <td class="text-right no-line"><strong>Durasi Pakai</strong></td>
                                    <td class="text-right no-line"><strong>Harga/jam</strong></td>
                                    <td class="text-right no-line"><strong>DP</strong></td>

                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr>
                                    <td><?php echo $data['nama_lapangan'] ?></td>
                                    <td class="text-center">
                                      <?php if ($data['id_booking'] == "") {
                                        echo "Tidak";
                                      } else {
                                        echo "Ya";
                                      }
                                      ?>
                                    </td>
                                    <td class="text-center"><?php echo $data['jam_sewa'] ?></td>
                                    <td class="text-right"><?php echo $data['durasi_sewa'] ?></td>
                                    <td class="text-right"><?php echo $data['harga_lapangan'] ?></td>
                                    <td class="text-right">
                                      <?php
                                      if ($data['id_booking'] == "") {
                                        echo 0;
                                      } else {
                                        echo $dp['dp'];
                                      }
                                      ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-right"><strong>Total</strong></td>
                                    <td class="thick-line text-right"><?php echo $data['total_bayar'] ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
<script>
  window.print();
</script>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
