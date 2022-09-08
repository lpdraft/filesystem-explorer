<?php
require 'upDateDir.php';
$fname = 'newFile.php';
fopen($fname, 'w+');

$myDir = 'newFolder';

if(!is_dir($myDir)){
mkdir($myDir);
} else{
    echo 'Oja, ese folder ya existe';
}
?>