<?php
$table = "tb_booking";
$where = "id = '$_GET[id]'";
$param = "BK".date("Ymd");
$def_param = $param."001";
$kode = $perintah->kode("id", $table, $def_param, $param);
$redirect = "?page=booking";
if (isset($_POST['simpan'])) {
  $field = array('id' => $kode, 'id_member' => $_POST['id_member'], 'bayar' => $_POST['bayar'], 'tgl_bayar' => date("Y-m-d"));
  $perintah->simpan($table, $field, $redirect);
}

if (isset($_GET['hapus'])) {
  $perintah->hapus($table, $where, $redirect);
}
 ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Transaksi <small class="text-secondary" style="font-size:18px">Booking</small> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Transaksi</li>
            <li class="breadcrumb-item active">Booking</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">
        Booking
      </h3>
    </div>
    <div class="card-body">
      <a href="index.php?page=inputBooking" class="btn btn-success btn-flat" style="margin-bottom: 10px"><span class="fa fa-plus"></span> Data</a>

      <table  id="booking" style="width:100%" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Id Member</th>
            <th>Lapangan</th>
            <th>DP</th>
            <th>Tanggal Sewa</th>
            <th>Durasi Sewa</th>
            <th>Tanggal Booking</th>
            <th>Pekerja</th>
            <th colspan="2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = $perintah->tampil($table);
            foreach ($sql as $isi) {
           ?>
          <tr>
            <td align="center"><?php echo $isi[0]; ?></td>
            <td align="center"><?php echo $isi[1]; ?></td>
            <td><?php echo $isi[2]; ?></td>
            <td align="right"><?php echo $isi[3]; ?></td>
            <td align="right"><?php echo $isi[4]; ?></td>
            <td align="right"><?php echo $isi[5]; ?></td>
            <td align="right"><?php echo $isi[6]; ?></td>
            <td align="right"><?php echo $isi[7]; ?></td>
            <form method="post">
            <td>
                <a href="?page=booking&hapus&id=<?php echo $isi[0] ?>" class="btn btn-danger" onclick="return confirm('<?php echo "Yakin Akan Menghapus data : ".$isi[0]." dengan nama ".$isi[2]." ?" ?> ')"><i class="fa fa-trash"></i></a>
            </td>
            <td>
              <a href="../pages/booking/strukBooking.php?id=<?php echo $isi[0] ?>" class="btn btn-info btn-info"><i class="fa fa-print"></i></button>
            </td>
          </form>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.card -->
  </div>



  <!-- modal tambah data-->
  <div id="tambahBooking" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Input Data Booking</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post">
            <div class="form-group row">
              <label for="" class="form-label col-md-2">Id Member</label>
              <div class="col-md-10">
                <div class="input-group">
                  <input type="text" name="id_member" class="form-control">
                  <span class="input-group-append">
                    <button type="button" name="cek" class="btn btn-secondary">Cek</button>
                  </span>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="form-label col-md-2">Bayar (Rp)</label>
              <div class="col-md-10">
                <?php
                  if (isset($_POST['cek'])) {
                    echo "cek";
                  } else {
                    echo "asd";
                  }
                 ?>
                <input type="text" id="bayar" class="form-control" placeholder="Masukan nominal pembayaran" name="bayar"  onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" value="100000" disabled>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-13 col-md-offset-1">
                <input type="submit" class="btn btn-primary btn-block btn-flat " name="simpan" value="Simpan">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- / modal tambah data-->
