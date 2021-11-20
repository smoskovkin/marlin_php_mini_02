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


if (isset($_FILES['img_input'])) {
    $image = $_FILES['img_input'];
} else {
    die('Файл не был загружен');
}


$upload_dir = './uploads/';

$current_link = $image['tmp_name'];
$new_link = $upload_dir . $image['name'];

move_uploaded_file($current_link, $new_link);


add_image_link_to_db($new_link);


unset($_FILES['img_input']);

redirect_to('./task_15.php');



