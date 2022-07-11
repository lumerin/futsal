<?php
$table = "tb_booking";
$where = "id = $_GET[id]";
$param = "BK".date("Ymd");
$def_param = $param."001";
$kode = $perintah->kode("id", $table, $def_param, $param);
$redirect = "?page=booking";
if (isset($_POST['simpan'])) {
  $field = array('id' => $kode, 'id_pelanggan' => $_POST['id_pelanggan'], 'id_lapangan' => $_POST['lapangan'], 'dp' => $_POST['dp'], 'tgl_sewa' => $_POST['tgl_sewa'], 'durasi_sewa' => $_POST['durasi_sewa'], 'tgl_booking' => date('Y-m-d'), 'user_pekerja' => $_SESSION['username']);
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

<div class="card card-primary card-outline col-md-10 offset-1">
  <div class="card-header">
    <h3 class="card-title">
      Input Booking
    </h3>
  </div>
  <div class="card-body">
    <form method="post">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">Id Pelanggan</label>
            <?php
            $daftarPelanggan = $perintah->tampil("tb_pelanggan");
            ?>
              <select class="form-control select2bs4" id="pelangganBooking" name="id_pelanggan">
                <option value="">Pilih Pelanggan</option>
              <?php foreach ($daftarPelanggan as $data) { ?>
                <option value="<?php echo $data[0] ?>" nama="<?php echo $data[1] ?>" noKtp="<?php echo $data[3] ?>" noHp="<?php echo $data[4] ?>"><?php echo $data[0] . " | " . $data[1] ?></option>
              <?php  } ?>
              </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" readonly="readonly">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">No KTP</label>
            <div class="input-group">
                <input type="text" id="noKtp" name="noktp" class="form-control" readonly="readonly">
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">No HP</label>
                <input type="text" id="noHp" name="nohp" class="form-control" readonly="readonly">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">Lapangan</label>
            <select class="custom-select" name="lapangan" >
              <option value="" selected>Pilih Lapangan</option>
              <?php
                $lapangan = $perintah->tampil("tb_lapangan");
                foreach ($lapangan as $data) {
               ?>
              <option value="<?php echo $data[0] ?>" select><?php echo $data[0]. " | " . $data[1] . " | Rp. ". $data[2] ?></option>
            <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">DP (Rp)</label>
              <input type="text" class="form-control" placeholder="Masukan nominal dp" name="dp"  onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" >
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">Tanggal Menyewa</label>
            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                <input type="text" name="tgl_sewa" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">Durasi Menyewa</label>
              <input type="number" class="form-control" placeholder="Masukan durasi sewa" name="durasi_sewa"  onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" >
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-13 col-md-offset-1">
          <input type="submit" class="btn btn-primary btn-block btn-flat " name="simpan" value="Simpan">
        </div>
      </div>
    </form>
  </div>
  <!-- /.card -->
</div>
