<?php

  $connection = mysqli_connect("localhost", "root", "root", "databasephp");

  if(isset($_POST['nama'])){

    $nama = '';
    foreach($_POST["nama"] as $row){
      $nama .=$row. ', ';
    }
    $nama =substr($nama,0,-2);
    $query = "INSERT INTO framework(nama) VALUE ('".$nama."')";
    if(mysqli_query($connection, $query)){
      echo 'Data Berhasil masuk ke database !';
    }
  }

 ?>
