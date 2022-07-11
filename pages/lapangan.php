<?php
$table = "tb_lapangan";
$where = "id = $_GET[id]";
$redirect = "?page=lapangan";
if (isset($_POST['simpan'])) {
  $field = array('nama' => $_POST['nama'], 'harga' => $_POST['harga']);
  $perintah->simpan($table, $field, $redirect);
}

if (isset($_POST['ubah'])) {
  $field = array('nama' => $_POST['nama'], 'harga' => $_POST['harga']);
  $perintah->ubah($table, $field, $where, $redirect);
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
            <h1 class="m-0">Kelola Data <small class="text-secondary" style="font-size:18px">Lapangan</small> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Kelola</li>
              <li class="breadcrumb-item active">Lapangan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">
        Data Lapangan
      </h3>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-success btn-flat" name="button" style="margin-bottom: 10px" data-toggle="modal" data-target="#tambahLapangan"><span class="fa fa-plus"></span> Data</button><br>

      <table  id="lapangan" style="width:100%" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = $perintah->tampil($table);
            foreach ($sql as $isi) {
           ?>
          <tr>
            <td align="center"><?php echo $isi[0]; ?></td>
            <td><?php echo $isi[1]; ?></td>
            <td><?php echo $isi[2]; ?></td>
            <td>
              <form method="post">
                <a href="?page=lapangan&hapus&id=<?php echo $isi[0] ?>" class="btn btn-danger" onclick="return confirm('<?php echo "Yakin Akan Menghapus data : ".$isi[0]." dengan nama ".$isi[1]." ?" ?> ')"><i class="fa fa-trash"></i></a> ||

                <a href="?page=lapangan&edit&id<?php echo $isi[0] ?>" class="btn btn-info btn-info"  data-toggle="modal" data-target="#editLapangan<?php echo $isi[0]?>"><i class="fa fa-edit"></i></button>
              </form>
            </td>
          </tr>

          <!-- modal edit data -->

          <div id="editLapangan<?php echo $isi[0]?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Edit Data Lapangan</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="index.php?page=lapangan&ubah&id=<?php echo @$isi[0] ?>" method="post">
                    <div class="form-group row">
                      <label class="col-md-2 form-label">Lapangan</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Masukan nama Lapangan" name="nama" value="<?php echo $isi[1] ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="form-label col-md-2">Harga</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Masukan Jumlah Stok" onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" name="harga" required value="<?php echo $isi[2] ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-13 col-md-offset-1">
                        <input type="submit" class="btn btn-primary btn-block btn-flat " name="ubah" value="Update">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- / modal edit data -->
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.card -->
  </div>



  <!-- modal tambah data-->
  <div id="tambahLapangan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Input Data Lapangan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post">
            <div class="form-group row">
              <label class="col-md-2 form-label">Lapangan</label>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Masukan nama Lapangan" name="nama">
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="form-label col-md-2">Harga</label>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Masukan Jumlah Stok" onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" name="harga" required>
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
