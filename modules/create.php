<?php

// $fname ='file.php';
// fopen($fname,'w+');


$dir = $_POST['name'];
mkdir($dir);

// $mensaje = 'Archivo creado';

header('location: ../index.php);
// header('location:../index.php?msg='.$mensaje);
?>