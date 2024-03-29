<?php
	class lib{
		function __construct() {
			$this->koneksi = mysqli_connect('localhost', 'root', '','db_futsal');
		}

		function simpan($table, array $field, $halaman) {
			$sql = "INSERT INTO $table SET";
			foreach ($field as $key => $value) {
				$sql.=" $key = '$value',";
			}
			$sql = rtrim($sql, ',');
			$jalan = mysqli_query($this->koneksi,$sql);
			if ($jalan) {
				echo "<script>alert('Berhasil !');document.location.href='$halaman'</script>";
			}else{
				echo "<script>alert('Gagal !');document.location.href='$halaman'</script>";
			}
		}

		function tampil($table) {
			$sql = "SELECT * FROM $table";
			$tampil = mysqli_query($this->koneksi,$sql);
			while ($data = mysqli_fetch_array($tampil))
				$isi[] = $data;
			return $isi;
		}

		function tampilkan($table, $where) {
			$sql = "SELECT * FROM $table WHERE $where";
			$tampil = mysqli_query($this->koneksi,$sql);
			while ($data = mysqli_fetch_array($tampil))
				$isi[] = $data;
			return $isi;
		}

		function tampiljumlah($table, $key, $where) {
			$sql = "SELECT $key FROM $table $where";
			$tampil = mysqli_query($this->koneksi,$sql);
			while ($data = mysqli_fetch_array($tampil))
				$isi[] = $data;
			return $isi;
		}

		function cari($table, $data, $inner, $where, $id) {
			$sql = "SELECT $data FROM $table $inner $where ORDER BY $id DESC";
			$tampil = mysqli_query($this->koneksi,$sql);
			while ($data = mysqli_fetch_array($tampil))
				$isi[] = $data;
			return $isi;
		}

		function carikan($table, $data, $inner, $where, $id) {
			$sql = "SELECT $data FROM $table $inner $where ORDER BY $id DESC";
			$tampil = mysqli_query($this->koneksi,$sql);
			$jalan = mysqli_fetch_array($tampil);
			return $jalan;
		}

		function hapus($table, $where, $halaman){
			$sql = "DELETE FROM $table WHERE $where";
			$jalan = mysqli_query($this->koneksi,$sql);
			if ($jalan) {
				echo "<script>alert('Berhasil');document.location.href='$halaman'</script>";
			}else{
				echo "<script>alert('Gagal');document.location.href='$halaman'</script>";
			}
		}

		function edit($table, $where){
			$sql = "SELECT * FROM $table WHERE $where";
			$jalan = mysqli_fetch_array(mysqli_query($this->koneksi,$sql));
			return $jalan;
		}


		function ubah($table, array $field, $where, $halaman){
			$sql = "UPDATE $table SET";
			foreach ($field as $key => $value) {
				$sql.=" $key = '$value',";

			}
			$sql = rtrim($sql, ',');
			$sql.="WHERE $where";
			$jalan = mysqli_query($this->koneksi,$sql);
			if ($jalan) {
				echo "<script>alert('Berhasil');document.location.href='$halaman'</script>";

			}else{
				echo mysqli_error("gagal");
			}
		}

		function kode($id, $table, $def_param, $param) {
			$sql = "SELECT $id FROM $table ORDER BY $id DESC LIMIT 0,1";
			$query = mysqli_query($this->koneksi,$sql);
			list ($no_temp) = mysqli_fetch_row($query);

			if ($no_temp == '') {
				$no_urut = $def_param;
			} elseif (substr($no_temp,2,8) != date("Ymd")) {
				$no_urut = $def_param;
			} else {
				$jum = substr($no_temp,10);
				$jum++;
				if($jum <= 9) {
					$no_urut = $param.'00'.$jum;
				} elseif ($jum <= 99) {
					$no_urut = $param.'0'.$jum;
				} else {
					die("Nomor urut melebih batas");
				}
			}
				return $no_urut;
		}

		function login($table, $username, $password, array $halaman){
			$sql = "SELECT username, password, akses FROM $table WHERE username = '$username' AND password = '$password'";
			$data_akses = mysqli_fetch_array(mysqli_query($this->koneksi,"SELECT akses FROM tb_user WHERE username = '$username'"));
			$perintah = mysqli_query($this->koneksi,$sql);
			$data = mysqli_fetch_array($perintah);
			$jalan = mysqli_num_rows($perintah);
			if ($jalan > 0) {
				if ($data_akses['akses'] == 'Admin') {
					$_SESSION['username'] = $username;
					$_SESSION['akses'] = $data_akses['akses'];
					echo "<script>alert('Selamat Datang Admin');document.location.href='$halaman[0]';</script>";
				} else {
					$_SESSION['username'] = $username;
					$_SESSION['akses'] = $data_akses['akses'];
					echo "<script>alert('Selamat Datang Super Admin');document.location.href='$halaman[1]';</script>";
				}
			} else {
				echo "<script>alert('Gagal Login');</script>";
			}
		}
	}
 ?>
