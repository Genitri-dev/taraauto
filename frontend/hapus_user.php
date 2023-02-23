<?php
    require '../backend/functions.php';

    $id= $_GET["id"];
    
    if( hapus_user($id) > 0 ) {
        echo "
            <script>
                alert('User Derhasil Dihapus!');
                document.location.href = 'user.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('User Gagal Hapus!');
                document.location.href = 'user.php';
            </script>
        ";
    }
?>