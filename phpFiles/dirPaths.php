<?php
session_start();

if(!isset($_SESSION['currentPath'])){
    $_SESSION['currentPath'] = $_SESSION['base_url'] . "/root";
} else{
    header('Location: ../index.php');
}

?>