<?php
    
    require "../backend/functions.php";

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
                    <a href="index.html"><h1 id="c_name_index"><span>TARA</span> AUTO</h1></a>
                </div>
                <!-- sidebars menu -->
                <div id="prd_wrp">
                    <a href="#"><h1>Produk</h1></a>
                </div>
                <div id="usr_wrp">
                    <a href="user.html"><h1>User</h1></a>
                </div>
                <div id="l_out_wrp">
                    <a href="logout.php"><h3>Log out</h3></a>
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
                    <tr>
                        <div id="tb_data">
                        <td>
                            1
                        </td>
                        <td>
                            <img src="../backend/img/olimobil.jpg" alt="olimobil">
                        </td>
                        <td>
                            Oli Mobil Castrol
                        </td>
                        <td>
                            789
                        </td>
                        <td>
                            180.000
                        </td>
                        <td>
                            Admin
                        </td>
                        <td>
                            <a id="edit" href="#wrp_edit">Edit</a>
                            <a  id="hapus" href="hapus.html">Hapus</a>
                        </td>
                        </div>
                    </tr>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            <img src="../backend/img/olimobil.jpg" alt="olimobil">
                        </td>
                        <td>
                            Oli Mobil Castrol
                        </td>
                        <td>
                            789
                        </td>
                        <td>
                            180.000
                        </td>
                        <td>
                            Admin
                        </td>
                        <td>
                            <a  id="edit" href="#wrp_edit">Edit</a>
                            <a  id="hapus" href="hapus.html">Hapus</a>
                        </td>
                    </tr>
                </table>
            </div>
            </div>
            <div id="paginations">
                <p>
                    <a href="#"> < </a>
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">...</a>
                    <a href="#">5</a>
                    <a href="#"> > </a>
                </p>
            </div>
            <!-- tambah produk -->
            <div id="wrp_tbh">
                <div id="content_out">
                    <div id="content">
                            <form action="post" id="form_tambah">
                                <h1>Tambah Produk</h1>
                                <div id="userinput_tambah_g">
                                    <label id="l_gamarp" for="gambarproduk">
                                      Select Image <br/>
                                      <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M38.65 15.3V11h-4.3V8h4.3V3.65h3V8H46v3h-4.35v4.3ZM4.7 44q-1.2 0-2.1-.9-.9-.9-.9-2.1V15.35q0-1.15.9-2.075.9-.925 2.1-.925h7.35L15.7 8h14v3H17.1l-3.65 4.35H4.7V41h34V20h3v21q0 1.2-.925 2.1-.925.9-2.075.9Zm17-7.3q3.6 0 6.05-2.45 2.45-2.45 2.45-6.1 0-3.6-2.45-6.025Q25.3 19.7 21.7 19.7q-3.65 0-6.075 2.425Q13.2 24.55 13.2 28.15q0 3.65 2.425 6.1Q18.05 36.7 21.7 36.7Zm0-3q-2.4 0-3.95-1.575-1.55-1.575-1.55-3.975 0-2.35 1.55-3.9 1.55-1.55 3.95-1.55 2.35 0 3.925 1.55 1.575 1.55 1.575 3.9 0 2.4-1.575 3.975Q24.05 33.7 21.7 33.7Zm0-5.5Z"/></svg>
                                      <input id="gambarproduk" name="gambarproduk" type="file"/>
                                      <br/>
                                      <span id="addphoto"></span>
                                    </label>
                                  </div>
                            <div id="userinput_tambah">
                                <input type="text" id="namaproduk" name="namaproduk" placeholder="Nama Produk">
                            </div>
                            <div id="userinput_tambah">
                                <input type="number" id="hargaproduk" name="hargaproduk" placeholder="Harga Produk">
                            </div>
                            <div id="userinput_tambah">
                                <input type="number" id="stokproduk" name="stokproduk" placeholder="Stok Produk">
                            </div>
                              <script>
                                  let input_add = document.getElementById("gambarproduk");
                                  let addphoto = document.getElementById("addphoto")
                            
                                  input_add.addEventListener("change", ()=>{
                                      let inputImage = document.querySelector("input[type=file]").files[0];
                                
                                      addphoto.innerText = inputImage.name;
                                  })
                              </script>
                            <div id="actions">
                                    <button type="submit" id="btn_benar" name="submit">Tambah Produk!</button>
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
                                    <form action="post" id="form_tambah">
                                        <h1>Edit Produk</h1>
                                    <div id="gambar">
                                        <img src="../backend/img/olimobil.jpg" width="250px" alt="olimobil">
                                    </div>
                                    <div id="userinput_tambah">
                                        <input type="text" id="namaproduk" name="namaproduk" placeholder="Nama Produk">
                                    </div>
                                    <div id="userinput_tambah">
                                        <input type="number" id="hargaproduk" name="hargaproduk" placeholder="Harga Produk">
                                    </div>
                                    <div id="userinput_tambah">
                                        <input type="number" id="stokproduk" name="stokproduk" placeholder="Stok Produk">
                                    </div>
                                    <div id="userinput_tambah_g_e">
                                        <label id="l_gambar" for="gambarproduk_e">
                                          Select Image <br/>
                                          <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M38.65 15.3V11h-4.3V8h4.3V3.65h3V8H46v3h-4.35v4.3ZM4.7 44q-1.2 0-2.1-.9-.9-.9-.9-2.1V15.35q0-1.15.9-2.075.9-.925 2.1-.925h7.35L15.7 8h14v3H17.1l-3.65 4.35H4.7V41h34V20h3v21q0 1.2-.925 2.1-.925.9-2.075.9Zm17-7.3q3.6 0 6.05-2.45 2.45-2.45 2.45-6.1 0-3.6-2.45-6.025Q25.3 19.7 21.7 19.7q-3.65 0-6.075 2.425Q13.2 24.55 13.2 28.15q0 3.65 2.425 6.1Q18.05 36.7 21.7 36.7Zm0-3q-2.4 0-3.95-1.575-1.55-1.575-1.55-3.975 0-2.35 1.55-3.9 1.55-1.55 3.95-1.55 2.35 0 3.925 1.55 1.575 1.55 1.575 3.9 0 2.4-1.575 3.975Q24.05 33.7 21.7 33.7Zm0-5.5Z"/></svg>
                                          <input id="gambarproduk_e" name="gambarproduk_e" type="file"/>
                                          <br/>
                                          <span id="addphoto_edit"></span>
                                        </label>
                                      </div>
                                      <script>
                                             let input_edit = document.getElementById("gambarproduk_e");
                                             let addphoto_edit = document.getElementById("addphoto_edit")
                            
                                             input_edit.addEventListener("change", ()=>{
                                             let inputImage = document.querySelector("input[type=file]").files[0];
                                              addphoto_edit.innerText = inputImage.name;
                                              })
                                      </script>
                                           <div id="actions">
                                            <button type="submit" id="btn_benar_e" name="submit">Tambah Produk!</button>
                                        </div>
                                    </form>
                                    <a href="#"><button id="btn_salah_e">Batal</button></a>
                                </div>
                            </div>
            </div>
    </div>
</body>
</html>
    </div>
</body>
</html>