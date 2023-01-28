<?php
    
    #sesion
    #session_start();
        #chek if user already login or not 
      # if(isset($_SESSION["login"])){
            #header("Locations: index.php");
      #  }
    #functions 
    require '../backend/functions.php';
    #function login 
    if( isset($_POST["login"]) ){

        $username = $_POST["username"];
        #get user name to last edit 
        $_SESSION["username"] = $username;
        $password = $_POST["password"];
        #verify user name 
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' " );
    
        if( mysqli_num_rows($result) === 1 ){

            #start login session 
            $_SESSION["login"] = true;

            #chek if password match 
            $row = mysqli_fetch_assoc($result);
            if ( password_verify($password , $row["password"]) ){
                if( $username == 'admin'){
                    header("Location: index.php");
                    exit();
                }
                else {
                    header("Location: indexuser.php");
                    exit();
                }
            }
        }
        $error = true;


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
    <link rel="stylesheet" href="style/style.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body id="login">
    
    <div id="wrapper_out_login">
        <ol>
            <li>
                <div id="g_mobil"></div>
            </li>
            <li>
                <form action="" method="post"  id="form_login">
                <?php if ( isset($error) ) : ?>
                     <script>
                        alert("Usser Name/Password Salah");
                     </script>
                <?php endif; ?>
                    <h1 id="c_name"><span>TARA</span> AUTO</h1>
                    <div id="userinput">
                        <input type="text" id="username" name="username" placeholder="User Name">
                        <img src="style/img/user.svg" alt="user.svg" id="icons">
                    </div>
                    <div id="userinput">
                        <input type="password" id="password" name="password" placeholder="Password">
                        <img src="style/img/lock.svg" alt="lock.svg" id="icons">
                    </div>
                    <button type="submit" name="login" id="b_login">
                            Login
                    </button>
                </form>
            </li>
        </ol>
    </div>
</body>
</html>