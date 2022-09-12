<?php
$myDir = '../root/newFolder';

if(!is_dir($myDir)){
    mkdir($myDir);
} else{
    echo 'Ojo, ese folder ya existe';
}



?>