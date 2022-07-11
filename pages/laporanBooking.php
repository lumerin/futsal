<?php
$table = "tb_booking";
$where = "WHERE tb_booking.tgl_booking BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
$data = "tb_booking.id as id_booking, tb_booking.id_pelanggan as id_pelanggan, tb_pelanggan.nama as nama_pelanggan, tb_pelanggan.nohp as nohp_pelanggan, tb_booking.id_lapangan as id_lapangan, tb_lapangan.nama as nama_lapangan, tb_lapangan.harga as harga_lapangan, tb_booking.dp, tb_booking.tgl_sewa, tb_booking.durasi_sewa, tb_booking.tgl_booking, tb_booking.user_pekerja as username_pekerja, tb_pekerja.nama as nama_pekerja, tb_pekerja.jabatan";
$inner = "INNER JOIN tb_pelanggan ON tb_booking.id_pelanggan = tb_pelanggan.id INNER JOIN tb_lapangan ON tb_booking.id_lapangan = tb_lapangan.id INNER JOIN tb_user ON tb_booking.user_pekerja = tb_user.username INNER JOIN tb_pekerja ON tb_user.id_pekerja = tb_pekerja.id";
$id = "tgl_booking";
$param = "BK".date("Ymd");
$def_param = $param."001";
$kode = $perintah->kode("id", $table, $def_param, $param);

$redirect = "?page=booking";
 ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan <small class="text-secondary" style="font-size:18px">Booking</small> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Laporan</li>
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
      <!-- Date and time range -->
      <div class="row col-md-12">
        <form method="post">
          <div class="form-group">
            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
              <label class="form-label">Tanggal Awal</label>
              <input type="text" class="form-control datetimepicker-input" name="tgl_awal" id="tgl_awal" data-target="#reservationdate1"/>
              <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
              <label class="form-label">Tanggal Akhir</label>
              <input type="text" class="form-control datetimepicker-input" name="tgl_akhir" id="tgl_akhir" data-target="#reservationdate2"/>
              <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="cari" value="Cari">
          </div>
        </form>
      </div>
      <!-- /.form group -->
      <table  id="laporanBooking" style="width:100%" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Id Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>No HP Pelanggan</th>
            <th>Id Lapangan</th>
            <th>Nama Lapangan</th>
            <th>Harga Lapangan</th>
            <th>DP</th>
            <th>Tanggal Sewa</th>
            <th>Durasi Sewa</th>
            <th>Tanggal Booking</th>
            <th>Username Pekerja</th>
            <th>Nama Pekerja</th>
            <th>Jabatan</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (isset($_POST['cari'])) {
              $sql = $perintah->cari($table, $data, $inner, $where, $id);
            } else {
              $sql = $perintah->cari($table, $data, $inner, "", $id);
            }
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
            <td><?php echo $isi[8]; ?></td>
            <td><?php echo $isi[9]; ?></td>
            <td><?php echo $isi[10]; ?></td>
            <td><?php echo $isi[11]; ?></td>
            <td><?php echo $isi[12]; ?></td>
            <td><?php echo $isi[13]; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.card -->
  </div>
