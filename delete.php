<?php
include 'config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM data_mahasiswa WHERE `data_mahasiswa`.`no` = $id;";
    $result = mysqli_query($db,$sql);
    header("location:admin_home.php");
}
$files    =glob('foto/*');
     foreach ($files as $file) {
      if (is_file($file)){
       unlink($file);
       }
     }
?>