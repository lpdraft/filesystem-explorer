<?php 
    //====================================
    //se carga la cookie de sesion que crea el navegador
    //setcookie ("PHPSESSID", "", time() - 3600, '/');
    //====================================
    session_start();
    $_SESSION['base_url'] = getcwd();
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Hola Draft Sheet</h1>
    </header>
    <main>
    <section id="sectionLeft">L</section>
    <section id="sectionCenter">C</section>
    <section id="sectionRight">R</section>
    </main>

    <?php
// Imprimir en la pantalla 
    // echo $_GET['msg'];
    ?>


<form action="upload.php" method="post" enctype="multipart/form-data">
    <!-- [enctype="multipart/form-data"] -->
     <!-- Nos permite subir cualquier tipo de archivos --> 
    <label for="file"><b>Upload Files</b></label><br>
    <input type="file" name="file" id="file"><br>
    <input type="submit" value="Upload">

</form>

    <br>
    <br>
    <br>
    <a href="phpFiles/createFolders.php">Folders</a>
    <a href="phpFiles/createFiles.php">Files</a>
    <a href="phpFiles/deleteOutputs.php">Delete</a>
</body>
</html>