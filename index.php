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
</head>
<body>
    <header>
        <h1>Hola</h1>
    </header>
    <main>
    <section id="sectionLeft">L</section>
    <section id="sectionCenter">C</section>
    <section id="sectionRight">R</section>
    </main>
<br>
<a href="phpFiles/createFil.php">Create</a>
<a href="phpFiles/deleteFil.php">Delete</a>
</body>
</html>