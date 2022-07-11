<?php
$table = "tb_pembayaran";
$where = "id = $_GET[id]";
$param = "TS".date("Ymd");
$def_param = $param."001";
$kode = $perintah->kode("id", $table, $def_param, $param);
$redirect = "../pages/pembayaran/strukPembayaran.php?id=$kode";
if (isset($_POST['bayar'])) {
  $field = array('id' => $kode, 'id_booking' => $_POST['id_booking'], 'id_pelanggan' => $_POST['id_pelanggan'], 'id_lapangan' => $_POST['id_lapangan'], 'jam_sewa' => date('H:i:s'), 'durasi_sewa' => $_POST['durasi_sewa'], 'total_bayar' => $_POST['total_bayar'], 'tgl_pembayaran' => date('Y-m-d'), 'user_pekerja' => $_SESSION['username']);
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
        <h1 class="m-0">Transaksi <small class="text-secondary" style="font-size:18px">Pembayaran</small> </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Transaksi</li>
          <li class="breadcrumb-item active">Pembayaran</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="card card-primary card-outline col-md-10 offset-1">
  <div class="card-header">
    <h3 class="card-title">
      Input Pembayaran Lapangan
    </h3>
  </div>
  <div class="card-body">
    <form method="post">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">Id Booking</label>
            <div class="input-group">
              <?php if (isset($_POST['cekb'])) {
                  $booking = $perintah->edit("tb_booking", "id = '$_POST[id_booking]'");
                  if (!$booking[0]) {
                    echo "<script>alert('Id Booking tidak ditemukan atau salah');document.location.href='?page=inputPembayaran'</script>";
                  }
                 ?>
                 <input type="text" name="id_booking" class="form-control" value="<?php echo $booking[0] ?>">
                 <span class="input-group-append">
                   <button name="cekb" class="btn btn-secondary">Cek</button>
                 </span>
              <?php } else { ?>
                <input type="text" name="id_booking" placeholder="Masukkan id booking bila ada" class="form-control">
                <span class="input-group-append">
                  <button name="cekb" class="btn btn-secondary">Cek</button>
                </span>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">Id Pelanggan</label>
            <div class="input-group">
              <?php
                $daftarPelanggan = $perintah->tampil("tb_pelanggan");
                if (isset($_POST['cekb'])) {
                  $booking = $perintah->edit("tb_booking", "id = '$_POST[id_booking]'");
                  $pelangganBooking = $perintah->edit("tb_pelanggan", "id = '$booking[1]'");
                 ?>
                  <select class="custom-select idPelanggan" name="id_pelanggan" readonly="readonly">
                    <option value="<?php echo $booking[1] ?>" selected><?php echo $booking[1] . " | " . $pelangganBooking[1] ?></option>
                  </select>
              <?php } else { ?>
                  <select class="form-control select2bs4 idPelanggan" id="pelangganBayar" name="id_pelanggan">
                    <option value="">Pilih Pelanggan</option>
              <?php foreach ($daftarPelanggan as $data) { ?>
                    <option noKtp="<?php echo $data[3] ?>" noHp="<?php echo $data[4] ?>" value="<?php echo $data[0] ?>"><?php echo $data[0] . " | " . $data[1] ?></option>
              <?php  } ?>
                  </select>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">No KTP</label>
              <?php if (isset($_POST['cekb'])) {
                $booking = $perintah->edit("tb_booking", "id = '$_POST[id_booking]'");
                $pelanggan = $perintah->edit("tb_pelanggan", "id = (SELECT id_pelanggan FROM tb_booking WHERE id = '$_POST[id_booking]' )");
                ?>
                <input type="text" class="form-control" name="no_ktp"  onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" disabled value="<?php echo $pelanggan[3] ?>">
              <?php } else { ?>
                <input type="text" id="noKtp" class="form-control" name="no_ktp" placeholder="xxxxxxxxxxxxxxxx"  onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" disabled>
              <?php } ?>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">No HP</label>
            <?php if (isset($_POST['cekb'])) {
              $booking = $perintah->edit("tb_booking", "id = '$_POST[id_booking]'");
              $pelanggan = $perintah->edit("tb_pelanggan", "id = (SELECT id_pelanggan FROM tb_booking WHERE id = '$_POST[id_booking]' )");
              ?>
              <input type="text" class="form-control" name="no_hp" value="<?php echo $pelanggan[4] ?>"  onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" readonly="readonly">
            <?php } else { ?>
              <input type="text" id="noHp" class="form-control" name="no_hp" placeholder="08xx-xxxx-xxxx"  onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" readonly="readonly">
            <?php
            }  ?>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">Lapangan</label>
            <div class="input-group">
              <?php if (isset($_POST['cekb'])) {
                   $booking = $perintah->edit("tb_lapangan", "id = (SELECT id_lapangan FROM tb_booking WHERE id = '$_POST[id_booking]' )");
                   ?>
                  <select class="custom-select" name="id_lapangan" readonly="readonly">
                    <option value="<?php echo $booking[0] ?>"><?php echo $booking[0]. " | " . $booking[1] . " | Rp. " . $booking[2] ?></option>
                  </select>
                 <?php } else { ?>
                    <select class="form-control select2bs4" id="hargaLapangan" name="id_lapangan">
                      <option value=" " harga="Rp. ">Pilih Lapangan</option>
                    <?php
                    $lapangan = $perintah->tampil("tb_lapangan");
                    foreach ($lapangan as $data) {
                      ?>
                      <option harga="<?php echo $data[2] ?>" value="<?php echo $data[0] ?>"><?php echo $data[0]. " | " . $data[1] . " | Rp. " . $data[2] ?></option>
                  <?php
                        } // tutup foreach
                      } ?>
                    </select>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">Durasi Menyewa</label>
            <?php if (isset($_POST['cekb'])) {
               $booking = $perintah->edit("tb_booking", "id = '$_POST[id_booking]'");
               ?>
               <input type="number" class="form-control" placeholder="Masukan durasi sewa" name="durasi_sewa"  onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" value="<?php echo $booking[5] ?>" readonly="readonly">
             <?php } else { ?>
               <input type="number" id="durasi" class="form-control" placeholder="Masukan durasi sewa" name="durasi_sewa"  onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" min="1">
             <?php } ?>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">DP (Rp)</label>
              <?php if (isset($_POST['cekb'])) {
                $booking = $perintah->edit("tb_booking", "id = '$_POST[id_booking]'");
                ?>
                <input type="text" class="form-control" name="dp"  onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" disabled value="<?php echo $booking[3] ?>">
              <?php } else { ?>
                <input type="text" class="form-control" name="dp" placeholder="Rp. 0"  onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" disabled>
              <?php } ?>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="" class="form-label">Total Bayar (Rp)</label>
            <?php if (isset($_POST['cekb'])) {
              $booking = $perintah->edit("tb_booking", "id = '$_POST[id_booking]'");
              $harga = $perintah->edit("tb_lapangan", "id = (SELECT id_lapangan FROM tb_booking WHERE id = '$_POST[id_booking]' )");
              if ($booking[1] != "0" || $booking[1] != "") {
                $total = ($harga[2] * $booking['durasi_sewa']) - $booking[3];
              }
              ?>
              <input type="text" class="form-control" name="total_bayar" value="<?php echo $total ?>"  onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" readonly="readonly">
            <?php } else { ?>
              <input type="text" id="totalBayar" class="form-control" name="total_bayar" placeholder="Rp. 0"  onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" readonly="readonly">
            <?php
            }  ?>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-13 col-md-offset-1">
          <input type="submit" class="btn btn-primary btn-block btn-flat " name="bayar" value="Bayar">
        </div>
      </div>
    </form>
  </div>
  <!-- /.card -->
</div>
