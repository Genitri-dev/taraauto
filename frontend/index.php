<?php   
    session_start();
    #chek if user already login or not 
    if(!isset($_SESSION["login"])){
         header("Location:  login.php");
        exit;
    }
    if ( $_SESSION["username"] == "admin"){
  
    } else {
     header("Location: indexuser.php");
    }
    require "../backend/functions.php";
    #fungsi untuk menambahkan produk 
    if( isset($_POST["tabah_prd"]) ){
        //apakah data berhasil di masukan atau tidak
        if( tambah($_POST) > 0){
            echo "
                <script>
                    alert('Produk Baru Berhasil Di Tambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Produk  Gagal Di Tambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }
    #paginations produk 
    $jumlahDataPerHalaman = 2;
    $jumlahData = count(query("SELECT * FROM produk"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;
    #fungsi untuk menampilkan produk dari database
    $produk = mysqli_query($conn,"SELECT * FROM produk LIMIT $awalData, $jumlahDataPerHalaman");
    #fungsi untukmencari produk 
    if( isset($_POST["cari"]) ) {
        $produk = cari($_POST["keyword"]);
    }
    #fungsi untuk mengedit produk
    $id_e = $_GET ["id"];
    if (empty($id_e)){
        $produk_edit = 0;
    } else {
        $produk_edit = query("SELECT * FROM produk WHERE produk_id = $id_e")[0];
    }
    
    if( isset($_POST["edit"]) ) {
        // cek apakah data berhasil diubah atau tidak 
        if( ubah($_POST) > 0 ) {
            echo "
                <script>
                    alert('Ubah Produk Berhasil');
                    document.location.href = 'index.php';
                </script>
            ";  
        } 
        else {
            echo "
                <script>
                    alert('Ubah Produk Gagal T-T');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    
    
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TARA AUTO</title>
    <!-- style -->
    <link rel="stylesheet" href="./style/style.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body id="user">
    <div id="conten_wrp">
            <nav>
                 <ol>
                    <li>
                        <div id="c_name_wrp">
                            <a href="index.php"><h1 id="c_name_index"><span>TARA</span> AUTO</h1></a>
                        </div>
                    </li>
                    <li>
                        <a href="#conten_wrp" id="menu_bar">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M6 36v-3h36v3Zm0-10.5v-3h36v3ZM6 15v-3h36v3Z"/></svg>
                        </a>
                        <a href="#">
                            <svg id="close" xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="m12.45 37.65-2.1-2.1L21.9 24 10.35 12.45l2.1-2.1L24 21.9l11.55-11.55 2.1 2.1L26.1 24l11.55 11.55-2.1 2.1L24 26.1Z"/></svg>
                        </a>
                    </li>
                    <li id="tambah">
                        <a href="#wrp_tbh"><button> <h2><span>+</span>Tambah</h2> </button></a>
                    </li>
                    <li>
                        <form  id="src_form" action="" method="post">
                            <input id="src_input" type="text" name="keyword" size="40" autofocus placeholder="Cari..." autocomplete="off">
                            <button id="src_button" type="submit" name="cari"><svg xmlns="http://www.w3.org/2000/svg"><path d="M39.8 41.95 26.65 28.8q-1.5 1.3-3.5 2.025-2 .725-4.25.725-5.4 0-9.15-3.75T6 18.75q0-5.3 3.75-9.05 3.75-3.75 9.1-3.75 5.3 0 9.025 3.75 3.725 3.75 3.725 9.05 0 2.15-.7 4.15-.7 2-2.1 3.75L42 39.75Zm-20.95-13.4q4.05 0 6.9-2.875Q28.6 22.8 28.6 18.75t-2.85-6.925Q22.9 8.95 18.85 8.95q-4.1 0-6.975 2.875T9 18.75q0 4.05 2.875 6.925t6.975 2.875Z"/></svg></button>
                        </form>
                    </li>
                 </ol>
            </nav>
            <div id="sidebar">
                <div id="sidebar_in">
                 <div id="c_name_wrp">
                    <a href="index.php"><h1 id="c_name_index"><span>TARA</span> AUTO</h1></a>
                </div>
                <!-- sidebars menu -->
                <div id="prd_wrp">
                    <a href="#"><h1>Produk</h1></a>
                </div>
                <div id="usr_wrp">
                    <a href="user.php"><h1>User</h1></a>
                </div>
                <div id="l_out_wrp">
                    <a href="logout.php" onclick="return confirm('Apakah Akan Logout');"><h3>Log out</h3></a>
                </div>
                </div>
            </div>
            <div id="tbl_w">
            <div id="table">
                <table>
                    <tr>
                        <div id="tb_head">
                            <th>
                                No
                            </th>
                            <th>
                                Foto
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                Stok
                            </th>
                            <th>
                                Harga
                            </th>
                            <th colspan="2">
                                Update Terakhir
                            </th>
                        </div>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach( $produk as $row ) : ?>
                        <tr>
                            <div id="tb_data">
                            <td style="display : none">
                                <?= $row["produk_id"]; ?>
                            </td>
                            <td>
                                <?= $i; ?> 
                            </td>
                            <td>
                            <img src="img/<?= $row['gambarproduk']?>">
                            </td>
                            <td>
                                 <?= $row["namaproduk"]; ?>
                            </td>
                            <td>
                                  <?= $row["stokproduk"]; ?>
                            </td>
                            <td>
                                  <?= $row["hargaproduk"]; ?>
                            </td>
                            <td>
                                 Last Edit By <?= $row["nama"]; ?>
                            </td>
                            <td>
                                <a href="?id=<?= $row["produk_id"]; ?>#wrp_edit">
                                    <svg style="fill:green" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                                    <path d="M21.35 42V30.75h3v4.15H42v3H24.35V42ZM6 37.9v-3h12.35v3Zm9.35-8.3v-4.1H6v-3h9.35v-4.2h3v11.3Zm6-4.1v-3H42v3Zm8.3-8.25V6h3v4.1H42v3h-9.35v4.15ZM6 13.1v-3h20.65v3Z"/>
                                    </svg>
                                </a>
                                <a  id="hapus" href="hapus.php?id=<?= $row['produk_id']?>" 
                                    onclick="return confirm('Apakah Produk Akan Di Hapus');">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M13.05 42q-1.25 0-2.125-.875T10.05 39V10.5H8v-3h9.4V6h13.2v1.5H40v3h-2.05V39q0 1.2-.9 2.1-.9.9-2.1.9Zm21.9-31.5h-21.9V39h21.9Zm-16.6 24.2h3V14.75h-3Zm8.3 0h3V14.75h-3Zm-13.6-24.2V39Z"/></svg>
                                </a>

                            </td>
                            </div>
                        </tr>
                        
                        <?php $i++; ?>
	                <?php endforeach; ?>
                </table>
            </div>
            </div>
            <div id="paginations">
            <?php if( $halamanAktif > 1 ) : ?>
	            <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
                <?php endif; ?>

                <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
                	<?php if( $i == $halamanAktif ) : ?>
                		<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: #000957;"><?= $i; ?></a>
                	<?php else : ?>
                		<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                	<?php endif; ?>
                <?php endfor; ?>
                    
                <?php if( $halamanAktif < $jumlahHalaman ) : ?>
                	<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
            <?php endif; ?>
            </div>
            <!-- tambah produk -->
            <div id="wrp_tbh">
                <div id="content_out">
                    <div id="content">
                            <form action="" method="post" id="form_tambah" enctype="multipart/form-data">
                                <h1>Tambah Produk</h1>
                                <div id="userinput_tambah_g">
                                    <label id="l_gamarp" for="gambarproduk">
                                      Upload Foto <br/>
                                      <!-- <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M38.65 15.3V11h-4.3V8h4.3V3.65h3V8H46v3h-4.35v4.3ZM4.7 44q-1.2 0-2.1-.9-.9-.9-.9-2.1V15.35q0-1.15.9-2.075.9-.925 2.1-.925h7.35L15.7 8h14v3H17.1l-3.65 4.35H4.7V41h34V20h3v21q0 1.2-.925 2.1-.925.9-2.075.9Zm17-7.3q3.6 0 6.05-2.45 2.45-2.45 2.45-6.1 0-3.6-2.45-6.025Q25.3 19.7 21.7 19.7q-3.65 0-6.075 2.425Q13.2 24.55 13.2 28.15q0 3.65 2.425 6.1Q18.05 36.7 21.7 36.7Zm0-3q-2.4 0-3.95-1.575-1.55-1.575-1.55-3.975 0-2.35 1.55-3.9 1.55-1.55 3.95-1.55 2.35 0 3.925 1.55 1.575 1.55 1.575 3.9 0 2.4-1.575 3.975Q24.05 33.7 21.7 33.7Zm0-5.5Z"/></svg> -->
                                      <input id="gambarproduk" name="gambarproduk" type="file"/>
                                    </label>
                                </div>
                            <div id="userinput_tambah">
                                <input type="text" id="namaproduk" name="namaproduk_tbh" placeholder="Nama Produk">
                            </div>
                            <div id="userinput_tambah">
                                <input type="number" id="hargaproduk" name="hargaproduk_tbh" placeholder="Harga Produk">
                            </div>
                            <div id="userinput_tambah">
                                <input type="number" id="stokproduk" name="stokproduk_tbh" placeholder="Stok Produk">
                            </div>
                              <!-- <script>
                                  let input_add = document.getElementById("gambarproduk");
                                  let addphoto = document.getElementById("addphoto")
                            
                                  input_add.addEventListener("change", ()=>{
                                      let inputImage = document.querySelector("input[type=file]").files[0];
                                
                                      addphoto.innerText = inputImage.name;
                                  })
                              </script> -->
                            <div id="actions">
                                    <button type="submit" id="btn_benar" name="tabah_prd">Tambah Produk!</button>
                                </div>
                            </form>
                            <a href="#"><button id="btn_salah">batal</button></a>
                        </div>
                    </div>
            </div>
            <!-- edit produk -->
            <div id="wrp_edit">
                            <div id="content_o">
                                <div id="content_ine">
                            <form action="" method="post" id="form_tambah" enctype="multipart/form-data">
                                <h1>Tambah Produk</h1>
                                    <input type="hidden" name="produkid" value="<?= $produk_edit['produk_id']?>">
                                    <input type="hidden" name="gambarLama" value="<?= $produk_edit['gambarproduk']?>">
                                    <div id="gambar">
                                                <img src="img/<?php echo $produk_edit['gambarproduk']?>" width="150px">
                                    </div>
                                    <div id="userinput_tambah">
                                        <input type="text" id="namaproduk" name="namaproduk" placeholder="Nama Produk" value="<?php echo $produk_edit["namaproduk"]; ?>">
                                    </div>
                                    <div id="userinput_tambah">
                                        <input type="number" id="hargaproduk" name="hargaproduk" placeholder="Harga Produk" value="<?php echo $produk_edit['hargaproduk']?>">
                                    </div>
                                    <div id="userinput_tambah">
                                        <input type="number" id="stokproduk" name="stokproduk" placeholder="Stok Produk" value="<?php echo $produk_edit['stokproduk']?>">
                                    </div>
                                      <!-- <script>
                                          let input_edit = document.getElementById("gambarproduk_edit");
                                          let editphoto = document.getElementById("addphoto_edit")

                                          input_edit.addEventListener("change", ()=>{
                                              let inputImage = document.querySelector("input[type=file]").files[0];
                                        
                                              editphoto.innerText = inputImage.name;
                                          })
                                      </script>
                                    <div id="userinput_tambah_g">
                                            <label id="l_gamarp" for="gambarproduk">
                                              Select Image <br/>
                                              <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M38.65 15.3V11h-4.3V8h4.3V3.65h3V8H46v3h-4.35v4.3ZM4.7 44q-1.2 0-2.1-.9-.9-.9-.9-2.1V15.35q0-1.15.9-2.075.9-.925 2.1-.925h7.35L15.7 8h14v3H17.1l-3.65 4.35H4.7V41h34V20h3v21q0 1.2-.925 2.1-.925.9-2.075.9Zm17-7.3q3.6 0 6.05-2.45 2.45-2.45 2.45-6.1 0-3.6-2.45-6.025Q25.3 19.7 21.7 19.7q-3.65 0-6.075 2.425Q13.2 24.55 13.2 28.15q0 3.65 2.425 6.1Q18.05 36.7 21.7 36.7Zm0-3q-2.4 0-3.95-1.575-1.55-1.575-1.55-3.975 0-2.35 1.55-3.9 1.55-1.55 3.95-1.55 2.35 0 3.925 1.55 1.575 1.55 1.575 3.9 0 2.4-1.575 3.975Q24.05 33.7 21.7 33.7Zm0-5.5Z"/></svg>
                                              <input id="gambarproduk" name="gambarproduk" type="file" style="display: none"/>
                                              <br/>
                                              <span id="addphoto_edit"></span>
                                            </label>
                                    </div> -->
                                    <div id="userinput_tambah_g">
                                    <label id="l_gamarp" for="gambarproduk">
                                      Upload Foto <br/>
                                      <!-- <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M38.65 15.3V11h-4.3V8h4.3V3.65h3V8H46v3h-4.35v4.3ZM4.7 44q-1.2 0-2.1-.9-.9-.9-.9-2.1V15.35q0-1.15.9-2.075.9-.925 2.1-.925h7.35L15.7 8h14v3H17.1l-3.65 4.35H4.7V41h34V20h3v21q0 1.2-.925 2.1-.925.9-2.075.9Zm17-7.3q3.6 0 6.05-2.45 2.45-2.45 2.45-6.1 0-3.6-2.45-6.025Q25.3 19.7 21.7 19.7q-3.65 0-6.075 2.425Q13.2 24.55 13.2 28.15q0 3.65 2.425 6.1Q18.05 36.7 21.7 36.7Zm0-3q-2.4 0-3.95-1.575-1.55-1.575-1.55-3.975 0-2.35 1.55-3.9 1.55-1.55 3.95-1.55 2.35 0 3.925 1.55 1.575 1.55 1.575 3.9 0 2.4-1.575 3.975Q24.05 33.7 21.7 33.7Zm0-5.5Z"/></svg> -->
                                      <input id="gambarproduk" name="gambarproduk" type="file"/>
                                    </label>
                                    </div>
                                    <div id="actions">
                                            <button type="submit" id="btn_benar" name="edit">Edit Produk</button>
                                    </div>
                            </form>
                            <a href="#"><button id="btn_salah">batal</button></a>
                        </div>
                    </div>
            </div>
</body>
</html>
    </div>
</body>
</html>