  <?php
  $table = "tb_pembayaran";
  $where = "WHERE tb_pembayaran.tgl_pembayaran BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
  $data = "tb_pembayaran.id as id_pembayaran, tb_pembayaran.id_booking, tb_pembayaran.id_pelanggan, tb_pelanggan.nama as nama_pelanggan, tb_pelanggan.nohp as nohp_pelanggan, tb_pembayaran.id_lapangan, tb_lapangan.nama as nama_lapangan, tb_lapangan.harga as harga_lapangan, tb_pembayaran.jam_sewa, tb_pembayaran.durasi_sewa, tb_pembayaran.total_bayar, tb_pembayaran.tgl_pembayaran, tb_pembayaran.user_pekerja as username_pekerja, tb_pekerja.nama as nama_pekerja, tb_pekerja.jabatan";
  $inner = "INNER JOIN tb_pelanggan ON tb_pembayaran.id_pelanggan = tb_pelanggan.id INNER JOIN tb_lapangan ON tb_pembayaran.id_lapangan = tb_lapangan.id INNER JOIN tb_user ON tb_pembayaran.user_pekerja = tb_user.username INNER JOIN tb_pekerja ON tb_user.id_pekerja = tb_pekerja.id";
  $id = "tgl_pembayaran";
  $param = "TS".date("Ymd");
  $def_param = $param."001";
  $kode = $perintah->kode("id", $table, $def_param, $param);
  $redirect = "?page=pembayaran";
   ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan <small class="text-secondary" style="font-size:18px">Pembayaran</small> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Laporan</li>
            <li class="breadcrumb-item active">Pembayaran</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">
          Pembayaran Lapangan
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
        <table  id="laporanPembayaran" style="width:100%" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id Pembayaran</th>
              <th>Id Booking</th>
              <th>Id Pelanggan</th>
              <th>Nama Pelanggan</th>
              <th>No HP Pelanggan</th>
              <th>Id Lapangan</th>
              <th>Nama Lapangan</th>
              <th>Harga Lapangan</th>
              <th>Jam Sewa</th>
              <th>Durasi Sewa</th>
              <th>Total Bayar</th>
              <th>Tanggal Pembayaran</th>
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
              <td><?php echo $isi[14]; ?></td>
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
