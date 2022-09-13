<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <script src="https://kit.fontawesome.com/9cf497312c.js" crossorigin="anonymous"></script>
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

        <div class="uploadFile">
        <form action="" method="POST" enctype="multipart/form-data" >
        <input class= "buttonSelect" type="file" name= "file">
        <input  class= "buttonUpload" type="submit" value= " Subir archivo " name = "button">
         </form>
         </div>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="./assets/yo.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>

          </ul>
        </div>
      </div>
    </header>
    


    

    <aside>



<?php

$formats = array('.jpeg', '.png', '.doc', '.pdf');
if(isset($_POST['button'])){
  $nameFile = $_FILES['file']['name'];
  $nameTmpFile = $_FILES['file']['tmp_name'];
  $ext = substr($nameFile, strrpos($nameFile, '.'));
    if (in_array($ext, $formats)){
        if (move_uploaded_file ($nameTmpFile, "assets/$nameFile")){
          echo "Valid file";
        }else{
          echo "Error";
        }
    }else{
      echo "Invalid file";
    } 
  }

?>

  </aside>


  <main>

    <div id="dashboard">
      <h3>Existing files</h3>
<?php
$dir = "assets";
if ($dir = opendir($dir)){
  while($file = readdir($dir)){
    if ($file != '.' && $file != '..') {
       echo "<strong> $file </strong> <br/>";
    }
    
 }
}
?>



        <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios1">
        

        
        <span class="d-block small opacity-50">With support text underneath to add more detail</span>
         </label>





      <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios1">
    First radio
    <span class="d-block small opacity-50">With support text underneath to add more detail</span>
  </label>


  <?php
  getFolders('./root');
  ?>



    </div>


</main>

</body>

</html>