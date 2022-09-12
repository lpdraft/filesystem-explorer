<?php
// To Create Files
$fname = '../root/nuevoFile.php';
fopen($fname, 'w+');

// To Delete Files, same as create file process
// unlink($fname);

$mensaje = 'Se creo el archivo';
// Despues de crear el archivo, vuelve al index.php
header('Location: ../index.php?msg='.$mensaje);
?>