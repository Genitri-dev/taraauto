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
                       <a href="index.html"><h1 id="c_name_index"><span>TARA</span> AUTO</h1></a>
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
                <table>
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
                            <th>
                                Password
                            </th>
                            <th colspan="2">
                                Update Terakhir
                            </th>
                        </div>
                    </tr>
                    <tr>
                        <div id="tb_data">
                        <td>
                            001
                        </td>
                        <td>
                             Admin
                        </td>
                        <td>
                            Admin                        
                        </td>
                        <td>
                            085714989477
                        </td>
                        <td>
                            *********
                        </td>
                        <td>
                            Admin
                        </td>
                        <td>
                            <a  id="edit" href="#conten_wrp_edit">Edit</a>
                            <a  id="hapus" href="hapus.html">Hapus</a>
                        </td>
                        </div>
                    </tr>
                    <tr>
                        <div id="tb_data">
                        <td>
                            001
                        </td>
                        <td>
                             Admin
                        </td>
                        <td>
                            Admin                        
                        </td>
                        <td>
                            085714989477
                        </td>
                        <td>
                            *********
                        </td>
                        <td>
                            Admin
                        </td>
                        <td>
                            <a  id="edit" href="#conten_wrp_edit">Edit</a>
                            <a  id="hapus" href="hapus.html">Hapus</a>
                        </td>
                        </div>
                    </tr>
                    <tr>
                        <div id="tb_data">
                        <td>
                            001
                        </td>
                        <td>
                             Admin
                        </td>
                        <td>
                            Admin                        
                        </td>
                        <td>
                            085714989477
                        </td>
                        <td>
                            *********
                        </td>
                        <td>
                            Admin
                        </td>
                        <td>
                            <a  id="edit" href="#conten_wrp_edit">Edit</a>
                            <a  id="hapus" href="hapus.html">Hapus</a>
                        </td>
                        </div>
                    </tr>
                    <tr>
                        <div id="tb_data">
                        <td>
                            001
                        </td>
                        <td>
                             Admin
                        </td>
                        <td>
                            Admin                        
                        </td>
                        <td>
                            085714989477
                        </td>
                        <td>
                            *********
                        </td>
                        <td>
                            Admin
                        </td>
                        <td>
                            <a  id="edit" href="#conten_wrp_edit">Edit</a>
                            <a  id="hapus" href="hapus.html">Hapus</a>
                        </td>
                        </div>
                    </tr>
                </table>
            
            </div>
            </div>
            <div id="paginations_user">
                <p>
                    <a href="#"> < </a>
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">...</a>
                    <a href="#">5</a>
                    <a href="#"> > </a>
                </p>
            </div>
            <div id="wrp_ad_usr">
                <div id="content_o">
                    <div id="content_ine">
                        <form action="post" id="form_tambah">
                            <h1>Tambah User</h1>
                        <div id="userinput_tambah">
                            <input type="text" id="namauser" name="namauser" placeholder="Nama User">
                        </div>
                        <div id="userinput_tambah">
                            <input type="text" id="username_ad_usr" name="username" placeholder="User Name">
                        </div>
                        <div id="userinput_tambah">
                            <input type="number" id="nohandphone" name="nohandphone" placeholder="No HP">
                        </div>
                        <div id="userinput_tambah">
                            <input type="text" id="password_ad_usr" name="namaproduk" placeholder="Password">
                        </div>
                        <div id="userinput_tambah">
                            <input type="text" id="repassword_ad_usr" name="namaproduk" placeholder="Ulangi Password">
                        </div>
                        <div id="actions">
                            <button type="submit" id="btn_benar" name="submit">Tambah User</button>
                        </div>
                        </form>
                        <a href="#"><button id="btn_salah_e">Batal</button></a>
                    </div>
                </div>
            </div>
            <div id="conten_wrp_edit">
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
            </div>
</body>
</html>