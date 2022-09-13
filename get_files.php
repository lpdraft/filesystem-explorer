<?php
function getFolders($path){
    if (is_dir($path)){
        if ($handle = opendir($path)){
            echo '<ul>' ;
            $files = [];
            while (false !== ($entry = readdir($handle))){
                if ($entry != "." && $entry != ".."){
                    array_push($files, $entry);
                }
            } 
           for ($i=0; $i < count($files); $i++){
            if(is_dir($path.'/'.$files[$i])){
                echo '<li id="'.path.'/'.$files[$i].'" >'.$files[$i] . '</li>';
                getFolders($path.'/'.$files[$i]);
            }
           } 
           echo '</ul>';
        }
    }
}