<?php   
    session_start();
    #chek if user already login or not 
    if(!isset($_SESSION["login"])){
         header("Location:  login.php");
        exit;
    }
    require "../backend/functions.php";
    #fungsi untuk menambahkan produk 
    if( isset($_POST["tabah_user"]) ){
        //apakah data berhasil di masukan atau tidak
        if( registrasi($_POST) > 0){
            echo "
                <script>
                    alert('User Baru  Di Tambahkan');
                    document.location.href = 'user.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('User  Gagal Di Tambahkan');
                    document.location.href = 'user.php';
                </script>
            ";
        }
    }
    #fungsi untuk menampilkan user dari database
    #pagi nations user
    $jumlahDataPerHalaman = 3;
    $jumlahData = count(query("SELECT * FROM user"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;
    $user = mysqli_query($conn,"SELECT * FROM user LIMIT $awalData, $jumlahDataPerHalaman");
    #fungsi untukmencari user 
    if( isset($_POST["cari"]) ) {
        $user = cariuser($_POST["keyword"]);
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
<body id="index">
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
                   <a href="#wrp_ad_usr"><button> <h2><span>+</span>Tambah</h2> </button></a>
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
            <a href="index.php"><h1>Produk</h1></a>
        </div>
        <div id="usr_wrp">
            <a href="#"><h1>User</h1></a>
        </div>
        <div id="l_out_wrp">
            <a href="logout.php"><h3>Log out</h3></a>
        </div>
        </div>
    </div>
            <div id="tbl_w_usr">
            <div id="table">
                <table style="text-align: center;">
                    <tr>
                        <div id="tb_head">
                            <th>
                                No
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                User Name
                            </th>
                            <th>
                                No Hp
                            </th>
                        </div>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach( $user as $row ) : ?>
                    <tr>
                        <div id="tb_data">
                        <td style="display : none">
                            <?= $row["userid"]; ?>
                        </td>
                        <td>
                            <?= $i; ?> 
                        </td>
                        <td>
                            <?= $row["username"]; ?>
                        </td>
                        <td>
                            <?= $row["nama"]; ?>
                        </td>
                        <td>
                            <?= $row["userphone"]; ?>
                        </td>
                        <td>
                                <!-- <a id="edit" href="#conten_wrp_edit"><svg xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                                    <path d="M21.35 42V30.75h3v4.15H42v3H24.35V42ZM6 37.9v-3h12.35v3Zm9.35-8.3v-4.1H6v-3h9.35v-4.2h3v11.3Zm6-4.1v-3H42v3Zm8.3-8.25V6h3v4.1H42v3h-9.35v4.15ZM6 13.1v-3h20.65v3Z"/></svg>
                                </a> -->
                                <a  id="hapus" href="hapus_user.php?id=<?= $row['userid']?>" 
                                    onclick="return confirm('Apakah User Akan Di Hapus');">
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
            <div id="paginations_user">
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
            <div id="wrp_ad_usr">
                <div id="content_o">
                    <div id="content_ine">
                        <form action="" method="post" id="form_tambah">
                            <h1>Tambah User</h1>
                        <div id="userinput_tambah">
                            <input type="text" id="namauser" name="nama" placeholder="Nama User">
                        </div>
                        <div id="userinput_tambah">
                            <input type="text" id="username_ad_usr" name="username" placeholder="User Name">
                        </div>
                        <div id="userinput_tambah">
                            <input type="number" id="nohandphone" name="phone" placeholder="No HP">
                        </div>
                        <div id="userinput_tambah">
                            <input type="text" id="password_ad_usr" name="password" placeholder="Password">
                        </div>
                        <div id="userinput_tambah">
                            <input type="text" id="repassword_ad_usr" name="password2" placeholder="Ulangi Password">
                        </div>
                        <div id="actions">
                                    <button type="submit" id="btn_benar" name="tabah_user">Tambah User!</button>
                        </div>
                        </form>
                        <a href="#"><button id="btn_salah_e">Batal</button></a>
                    </div>
                </div>
            </div>
            <!-- <div id="conten_wrp_edit">
                    <div id="wrp_ed_usr">
                            <div id="content_o">
                                <div id="content_ine">
                                    <form action="post" id="form_tambah">
                                        <h1>Edit User</h1>
                                    <div id="userinput_tambah">
                                        <input type="text" id="username_ad_usr" name="username" placeholder="User Name">
                                    </div>
                                    <div id="userinput_tambah">
                                        <input type="number" id="nohandphone" name="nohandphone" placeholder="No HP">
                                    </div>
                                    <div id="userinput_tambah">
                                        <input type="password" id="password_ad_usr" name="namaproduk" placeholder="Password">
                                    </div>
                                    <div id="userinput_tambah">
                                        <input type="password" id="repassword_ad_usr" name="namaproduk" placeholder="Ulangi Password">
                                    </div>
                                    <div id="actions">
                                        <button type="submit" id="btn_benar" name="submit">Tambah User</button>
                                    </div>
                                    </form>
                                    <a href="#"><button id="btn_salah_e">Batal</button></a>
                                </div>
                            </div>
                    </div>
            </div> -->
</body>
</html>