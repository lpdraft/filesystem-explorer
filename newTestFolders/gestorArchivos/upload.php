<?php
if($_FILES['upload_file']['name'] != ''){
    $data = explode('.', $_FILES['upload_file']['name']);
    $extension = $data[1];
    $allowed_extn = array('jpg','png','gif','svg', 'html', 'mp3', 'mp4','pdf','docx','txt','psd','tiff');

    if(in_array($extension, $allowed_extn )){
        $new_file_name = rand().'.'.$extension;
        $path = $_POST['hidden_folder_name']. '/'. $new_file_name;

        if(move_uploaded_file($_FILES['upload_file']['tmp_name'], $path)){
            echo 'Congrats! File Uploaded';
        } else{
            echo 'Error, please try again';
        }
    } else{
        echo "Sorry, Invalid File!";
    }
} else{
    echo 'Please, Select File!';
}
?>