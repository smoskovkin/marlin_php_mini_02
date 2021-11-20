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


function is_link_exist_in_db($new_link)
{
    $link = db_query();

    $sql_query = "SELECT * FROM images WHERE link = '$new_link'";

    $result = mysqli_query($link, $sql_query) or die(mysqli_error($link));

    $row = mysqli_fetch_assoc($result);

    return isset($row);
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
$new_link     = $upload_dir.$image['name'];

move_uploaded_file($current_link, $new_link);


$image_link_exist_in_db = is_link_exist_in_db($new_link);

if ( ! $image_link_exist_in_db) {
    add_image_link_to_db($new_link);
}


unset($_FILES['img_input']);

redirect_to('./task_15.php');



