<?php
#SCANDIR
/*$path = __DIR__;
$contents = scandir($path);
// Files y folders que estan en un directorio concreto 
// Desventaja: NO es flexible ya que simplemente trae todos los elementos que hay en ese directorio
echo '<pre>';
print_r($contents); */


#GLOB
// Get only php files, js
// Ojo los archivos tienen que estar en el mismo nivel
/*$path = __DIR__ . DIRECTORY_SEPARATOR . "*.{php,js}";
$contents = glob($path,GLOB_BRACE);
echo '<pre>';
print_r($contents);*/

// Only Folders
/*$path = __DIR__ . DIRECTORY_SEPARATOR . "*";
$contents = glob($path,GLOB_ONLYDIR);
echo '<pre>';
print_r($contents);*/


#OpenDir
$path = __DIR__;
if($fh = opendir($path)){
    while(($entry = readdir($fh)) !==false){
        // Todos los elementos
        // echo $entry . '<br>';
      
        // Condicion 
        if($entry != "." && $entry != ".."){
            echo $entry . '<br>';
            // Is it file or folder?
            $thisEntry = $path . DIRECTORY_SEPARATOR . $entry;
            echo is_dir($thisEntry)? 'Folder':'File';
            echo '<br>';
        }

    }
}

?>