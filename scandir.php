<?php
$path = __DIR__;
$contents = scandir($path);
print_r($contents);

header('Location: ../index.php?');
?>
