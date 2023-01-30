<?php
    #connect to data base
    $conn = mysqli_connect("localhost","root","","taraauto",);
    #chek if the conect to the data base
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
    //menambahkan 
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
	global $verfi;
	$namaFile = $_FILES['gambarproduk_tbh']['name'];
	$ukuranFile = $_FILES['gambarproduk_tbh']['size'];
	$error = $_FILES['gambarproduk_tbh']['error'];
	$tmpName = $_FILES['gambarproduk_tbh']['tmp_name'];
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
	//hapus 
	function hapus ($id) {
		global $conn;
		mysqli_query($conn, "DELETE FROM produk WHERE produk_id = $id");
		return mysqli_affected_rows($conn);
	}
?>