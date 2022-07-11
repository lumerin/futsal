<?php
$table = "tb_user";
$where = "username = '$_GET[username]'";
$redirect = "?page=user";
if (isset($_POST['simpan'])) {
  $field = array('username' => $_POST['username'], 'password' => $_POST['password'], 'akses' => $_POST['akses'], 'id_pekerja' => $_POST['id_pekerja']);
  $perintah->simpan($table, $field, $redirect);
}

if (isset($_POST['ubah'])) {
  $field = array('username' => $_POST['username'], 'password' => $_POST['password'], 'akses' => $_POST['akses'], 'id_pekerja' => $_POST['id_pekerja']);
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
          <h1 class="m-0">Kelola Data <small class="text-secondary" style="font-size:18px">User</small> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Kelola</li>
            <li class="breadcrumb-item active">User</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">
        Data User
      </h3>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-success btn-flat" name="button" style="margin-bottom: 10px" data-toggle="modal" data-target="#tambahUser"><span class="fa fa-plus"></span> Data</button><br>

      <table  id="user" style="width:100%" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Akses</th>
            <th>Id Pekerja</th>
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
            <td align="right"><?php echo $isi[3]; ?></td>
            <td>
              <form method="post">
                <a href="?page=user&hapus&username=<?php echo $isi[0] ?>" class="btn btn-danger" onclick="return confirm('<?php echo "Yakin Akan Menghapus data : ".$isi[0]." dengan nama ".$isi[1]." ?" ?> ')"><i class="fa fa-trash"></i></a> ||

                <a href="?page=user&edit&username<?php echo $isi[0] ?>" class="btn btn-info btn-info"  data-toggle="modal" data-target="#editUser<?php echo $isi[0]?>"><i class="fa fa-edit"></i></button>
              </form>
            </td>
          </tr>

          <!-- modal edit data -->

          <div id="editUser<?php echo $isi[0]?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Edit Data User</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="index.php?page=user&ubah&username=<?php echo @$isi[0] ?>" method="post">
                    <div class="form-group row">
                      <label class="col-md-2 form-label">Username</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Masukan username" name="username" value="<?php echo $isi[0] ?>" onkeyPress="return ((event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode != 32 && event.charCode >= 48 && event.charCode <= 57 ))">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-2 form-label">Password</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Masukan password" name="password" value="<?php echo $isi[1] ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-2 form-label">Akses</label>
                      <div class="col-md-10">
                        <select class="custom-select" name="akses">
                          <option value="<?php echo $isi[2] ?>"><?php echo $isi[2] ?></option>
                          <option value="Admin">Admin</option>
                          <option value="Super Admin">Super Admin</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="" class="form-label col-md-2">Id Pekerja</label>
                      <div class="col-md-10">
                        <?php

                         ?>
                        <select class="custom-select" name="id_pekerja">
                          <option value="<?php echo $isi[3] ?>"><?php echo $isi[3] ?></option>
                          <?php
                              $sql = $perintah->tampilkan("tb_pekerja", "jabatan = 'Admin' OR jabatan = 'Pemilik'");
                              foreach ($sql as $data) {
                           ?>
                           <option value="<?php echo $data[0] ?>"><?php echo $data[0] . " | " . $data[1] . " | " . $data[5] ?></option>
                         <?php } ?>
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
  <div id="tambahUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Input Data User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post">
            <div class="form-group row">
              <label class="col-md-2 form-label">Username</label>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Masukan username" onkeyPress="return ((event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode != 32 && event.charCode >= 48 && event.charCode <= 57 ))" name="username" value="">
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="form-label col-md-2">Password</label>
              <div class="col-md-10">
                <input type="text" name="password" id="password" class="form-control" placeholder="Password">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 form-label">Akses</label>
              <div class="col-md-10">
                <select class="custom-select" name="akses">
                  <option value="">Pilih Akses</option>
                  <option value="Admin">Admin</option>
                  <option value="Super Admin">Super Admin</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="form-label col-md-2">Id_pekerja</label>
              <div class="col-md-10">
                <select class="custom-select" name="id_pekerja">
                  <option value="">Pilih pekerja</option>
                  <?php
                      $sql = $perintah->tampilkan("tb_pekerja", "jabatan = 'Admin' OR jabatan = 'Pemilik'");
                      foreach ($sql as $data) {
                   ?>
                   <option value="<?php echo $data[0] ?>"><?php echo $data[0] . " | " . $data[1] . " | " . $data[5] ?></option>
                 <?php } ?>
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
