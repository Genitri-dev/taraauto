<?php
    #koneksi ke  data base
    $conn = mysqli_connect("localhost","root","","taraauto",);
	#fungsi query 
	function query($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}
    #chek ikoneksi ke  data base
    if(mysqli_error($conn)){
        echo "Koneksi Data base gagal";
    }
    else {
        echo "Koneksi Database Berhasil";
    }
		//to delete file if its not use in database
		$path = '../frontend/img/';
		//get lits of that folder use scandir
		$files = scandir($path);
		$files = array_diff($files, array('.','..'));
		foreach ($files as $file) {
			// Check if the file is in the database
			$sql = "SELECT * FROM produk WHERE gambarproduk = '$file'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) == 0) {
				// The file is not in the database - delete it from the folder
				unlink($path. '/' . $file);
			}
		}
    #menambahkan 
    function tambah ($data){
	global $conn;
	$namaproduk =  htmlspecialchars($data["namaproduk_tbh"]);
	$stokproduk =  htmlspecialchars($data["stokproduk_tbh"]);
    $hargaproduk = htmlspecialchars($data["hargaproduk_tbh"]);

	#print_r($_FILES['gambarproduk']);
	// upload gambar
	$gambarproduk = upload();
	if( !$gambarproduk ){
		return false;
	}
    
	//memasukan data ke data base
	$query = "INSERT INTO `produk`
			 VALUES 
			 (NULL,NULL,'$namaproduk','$stokproduk','$gambarproduk','$hargaproduk')
			 ";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
    }
    
    function upload() {
		$namaFile = $_FILES['gambarproduk']['name'];
		$ukuranFile = $_FILES['gambarproduk']['size'];
		$error = $_FILES['gambarproduk']['error'];
		$tmpName = $_FILES['gambarproduk']['tmp_name'];
		// di upload atau tidak
		if ( $error === 4 ){
		echo"
			<script>
				alert('Gambar Tidak Bole Kosong');
			</script>
		";
		return false;
		}

		//hanya boleh upload gambar
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

		$ekstensiGambar = explode('.', $namaFile);

		$ekstensiGambar = strtolower(end($ekstensiGambar));

		if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
				document.location.href = 'index.php';
			  </script>";
		exit();
		return false;
		}
		//jika ukuran gambar terlalubesar 
		else if( $ukuranFile > 1000000 ) {
			echo "<script>
					alert('ukuran gambar terlalu besar!');
				  </script>";
			return false;
			exit();
		} else {
		//lolos pengecekan gambar lolos di upload 
		// generate nama gambar baru 
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;
		move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
		return $namaFileBaru;
		}
    }
	#hapus 
	function hapus ($id) {
		global $conn;
		mysqli_query($conn, "DELETE FROM produk WHERE produk_id = $id");
		return mysqli_affected_rows($conn);
	}
	#cari barang
	function cari($keyword) {
		$query = "SELECT * FROM produk
					WHERE
				  namaproduk LIKE '%$keyword%' OR
				  stokproduk LIKE '%$keyword%' OR
				  hargaproduk LIKE '%$keyword%' OR
				  nama LIKE '%$keyword%'
				";
		return query($query);
	}
	#menambahkan user 
	function registrasi($data){
		#variable	
	   	global $conn;
		$username = $data["username"];
	  	$name = $data["nama"];
		$phone = $data["phone"];
		$password = $data["password"];
	   	$password2 =$data["password2"];
		  #cek apakah username sudah terdaftar atau belum 
			$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
		  if( mysqli_fetch_assoc($result) ) {
			  echo "<script>
			  alert('username sudah terdaftar')
			  </script>";
			  return false;
		  }
		  // cek form sudah di isi atau belum
		  if (empty($username && $password)){
			  echo "<script>
					  alert('username dan password harus di isi')
					</script>";
			  return false;
		  } 
		  // cek konfirmasi password
	  
		  if( $password !== $password2 ) {

			  echo "<script>
				alert('konfirmasi password tidak sesuai!');
			  </script>";

			return false;
		  }
		  // enkripsi password
		  $password = password_hash($password, PASSWORD_DEFAULT);
		  // tambahkan userbaru ke database
		  mysqli_query($conn, "INSERT INTO `user` (`userid`, `username`, `nama`, `userphone`, `password`) VALUES (NULL, '{$username}', '{$name}', '{$phone}', '{$password}')");
		  return mysqli_affected_rows($conn);
	}
	#hapus user 
	function hapus_user($id) {
		global $conn;
		mysqli_query($conn, "DELETE FROM user WHERE userid = $id");
		return mysqli_affected_rows($conn);
	}
	#cari user 
	function cariuser($keyword) {
		$query = "SELECT * FROM user
					WHERE
				  username LIKE '%$keyword%' OR
				  nama LIKE '%$keyword%' OR
				  userphone LIKE '%$keyword%'
				";
		return query($query);
	}
	//ubah informasi produk
	function ubah ($data){
		global $conn;
		$id = $data["produkid"];
		$namaproduk =  ($data["namaproduk"]);
		$stokproduk =  ($data["stokproduk"]);
	    $hargaproduk = ($data["hargaproduk"]);
		$gambarLama = ($data["gambarLama"]);
		$gambarproduk = isset ($data["gambarproduk"]);
		$namauser =  $_SESSION['username'];
		echo $id;
		die();
		//cek user memasukan gambar baru atau tidak
		if ($_FILES["gambarproduk"]["error"] === 4) {
			$gambarproduk = $gambarLama;
		} else {
			$gambarproduk = upload();
		}
		//memasukan data ke data base
		$query = "UPDATE `produk` SET 
		`nama` = '$namauser', 
		`namaproduk` = '$namaproduk', 
		`stokproduk` = '$stokproduk', 
		`gambarproduk` = '$gambarproduk', 
		`hargaproduk` = '$hargaproduk'
		 WHERE `produk`.`produkid` = $id ";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}

?>