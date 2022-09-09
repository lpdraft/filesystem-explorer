<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>MyDrive</title>
</head>
<body>
    <header>
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">MyDrive</a></li>

        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="./assets/yo.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </header>
    


    <main>

    <section id="sectionLeft">
    <div class="containerLeft">
    <a href="./modules/newfile.php">Crear archivo</a>

<br>
    <a href="./modules/deletefile.php">Borrar archivo</a>
<br>
<br>
<br>
<br>
    <form action="create.php" method="POST">
        Name of the folder:
        <input type="text" name="name">
        <input type="submit" value= "create">
    </form>

<?php
// echo $_GET['msg'];

$path = ".";
$dir = opendir($path) or die ("Unable to open directory");

while($file = readdir($dir)) {

 if ($file == "." || $file == ".."|| $file== "create.php" || $file = "deletefile.php" )
    continue;
    echo " <a href ='$file'> $file </a><a href='delete.php?dir=$file'> </a> ";
}

closedir($dir);
?>

    </div>
    </section>

    <section id="sectionCenter"></section>
    <section id="sectionRight"></section>
    </main>

</body>
</html>