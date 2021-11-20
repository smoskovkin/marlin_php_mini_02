<?php


function db_query()
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $name = 'marlin-mini-2';

    $link = mysqli_connect($host, $user, $pass, $name);
    mysqli_query($link, "SET NAMES 'utf8'");

    return $link;
}


function add_image_link_to_db($new_link)
{
    $link = db_query();

    $sql_query = "INSERT INTO images (link) VALUES ('$new_link')";

    mysqli_query($link, $sql_query) or die(mysqli_error($link));
}


function redirect_to($path)
{
    header("Location: $path");

    exit;
}


if (isset($_FILES['images'])) {
    $images = $_FILES['images'];
} else {
    die('Файлы не были загружены');
}



$upload_dir = './uploads/';

for ($i = 0; $i < count($images['name']); $i++) {

    $path_parts = pathinfo($images['name'][$i]);

    $current_link = $images['tmp_name'][$i];
    $new_link     = $upload_dir.$path_parts['filename'].'_'.uniqid().'.'.$path_parts['extension'];

    move_uploaded_file($current_link, $new_link);


    add_image_link_to_db($new_link);
}


unset($_FILES['images']);


redirect_to('./task_15.php');



