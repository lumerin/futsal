<?php
$table = "tb_pekerja";
$where = "id = $_GET[id]";
$redirect = "?page=pekerja";
if (isset($_POST['simpan'])) {
  $field = array('nama' => $_POST['nama'], 'jk' => $_POST['jk'], 'alamat' => $_POST['alamat'], 'noktp' => $_POST['noktp'], 'nohp' => $_POST['nohp'], 'jabatan' => $_POST['jabatan']);
  $perintah->simpan($table, $field, $redirect);
}

if (isset($_POST['ubah'])) {
  $field = array('nama' => $_POST['nama'], 'jk' => $_POST['jk'], 'alamat' => $_POST['alamat'], 'noktp' => $_POST['noktp'], 'nohp' => $_POST['nohp'], 'jabatan' => $_POST['jabatan']);
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
          <h1 class="m-0">Kelola Data <small class="text-secondary" style="font-size:18px">Pekerja</small> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Kelola</li>
            <li class="breadcrumb-item active">Pekerja</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">
        Data Pekerja
      </h3>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-success btn-flat" name="button" style="margin-bottom: 10px" data-toggle="modal" data-target="#tambahPekerja"><span class="fa fa-plus"></span> Data</button><br>

      <table  id="pekerja" style="width:100%" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No KTP</th>
            <th>No Hp</th>
            <th>Jabatan</th>
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
            <td>
            <?php if ($isi[2] == "P") {
              echo "Pria";
            } else {
              echo "Wanita";
            }
            ?>
          </td>
            <td align="right"><?php echo $isi[3]; ?></td>
            <td align="right"><?php echo $isi[4]; ?></td>
            <td align="right"><?php echo $isi[5]; ?></td>
            <td><?php echo $isi[6]; ?></td>
            <td>
              <form method="post">
                <a href="?page=pekerja&hapus&id=<?php echo $isi[0] ?>" class="btn btn-danger" onclick="return confirm('<?php echo "Yakin Akan Menghapus data : ".$isi[0]." dengan nama ".$isi[1]." ?" ?> ')"><i class="fa fa-trash"></i></a> ||

                <a href="?page=pekerja&edit&id<?php echo $isi[0] ?>" class="btn btn-info btn-info"  data-toggle="modal" data-target="#editPekerja<?php echo $isi[0]?>"><i class="fa fa-edit"></i></button>
              </form>
            </td>
          </tr>

          <!-- modal edit data -->

          <div id="editPekerja<?php echo $isi[0]?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Edit Data Pekerja</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="index.php?page=pekerja&ubah&id=<?php echo @$isi[0] ?>" method="post">
                    <div class="form-group row">
                      <label class="col-md-2 form-label">Pekerja</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Masukan nama pekerja" name="nama" value="<?php echo $isi[1] ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-2 form-label">Jenis Kelamin</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" value="P" <?php if($isi['jk']=='P') echo 'checked'?>>
                        <label class="form-check-label">Pria</label>
                      </div>
                      &nbsp
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" value="W" <?php if($isi['jk']=='W') echo 'checked'?>>
                        <label class="form-check-label">Wanita</label>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="form-label col-md-2">Alamat</label>
                      <div class="col-md-10">
                        <textarea  name="alamat" rows="3" placeholder="Masukan alamat" class="form-control" required><?php echo $isi[3] ?></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-2 form-label">No KTP</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Masukan No KTP" name="noktp" maxlength="17" value="<?php echo $isi[4] ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="form-label col-md-2">No hp</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Masukan no handphone" onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" name="nohp" required value="<?php echo $isi[5] ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="form-label col-md-2">Jabatan</label>
                      <div class="col-md-10">
                        <select class="custom-select" name="jabatan" required>
                          <option value="<?php echo $isi[6] ?>"><?php echo $isi[6] ?></option>
                          <option value="Admin">Admin</option>
                          <option value="Petugas Kebersihan">Petugas Kebersihan</option>
                          <option value="Petugas Keamanan">Petugas Keamanan</option>
                        </select>
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
  <div id="tambahPekerja" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Input Data Pekerja</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post">
            <div class="form-group row">
              <label class="col-md-2 form-label">Pekerja</label>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Masukan nama pekerja" name="nama" value="">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 form-label">Jenis Kelamin</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" value="P">
                <label class="form-check-label">Pria</label>
              </div>
              &nbsp
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" value="W">
                <label class="form-check-label">Wanita</label>
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="form-label col-md-2">Alamat</label>
              <div class="col-md-10">
                <textarea name="alamat" rows="3" placeholder="Masukan alamat" class="form-control" required></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 form-label">No KTP</label>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Masukan No KTP" name="noktp" maxlength="17">
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="form-label col-md-2">No hp</label>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Masukan no handphone" name=nohp onkeyPress="return (event.charCode >= 48 && event.charCode <= 57)" required value="">
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="form-label col-md-2">Jabatan</label>
              <div class="col-md-10">
                <select class="custom-select" name="jabatan" required>
                  <option value="" selected>Pilih Jabatan</option>
                  <option value="Admin">Admin</option>
                  <option value="Petugas Kebersihan">Petugas Kebersihan</option>
                  <option value="Petugas Keamanan">Petugas Keamanan</option>
                </select>
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
