<?php
include 'index.php';

// Para recibir los archivos necesitamos la variable files (nada de Get ni Post)
// Primero indicar que input y luego que queremos obtener de ese input
$file_name = $_FILES['file']['name'];
// La ruta temporal del archivo (copia/pega de los files)
$file_temp = $_FILES['files']['temp_name'];
// Crear la ruta (cuando se suben los archivos)
$route = 'assets'.$file_name;

#Mover el archivo subido (dos parametro: la tempora y absoluta de almacenamiento)
move_uploaded_file($file_temp,$route);

?>