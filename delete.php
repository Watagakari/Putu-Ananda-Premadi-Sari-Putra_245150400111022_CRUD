<?php 
require "config.php";

$nim=$_GET['nim'];

if (delete($nim) > 0) {
    echo "<script>
            alert('Data berhasil didelete');
            document.location.href='main.php';
        </script>";
} else {
    echo "<script>
            alert('Data gagal didelete');
            document.location.href='main.php';
        </script>";
}
?>