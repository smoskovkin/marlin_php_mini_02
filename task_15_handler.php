<?php


function db_query()
{
    $host = 'localhost';
    $db = 'marlin-mini-2';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($dsn, $user, $pass, $opt);

    return $pdo;
}


function add_image_link_to_db($new_link)
{
    $pdo = db_query();

    $sql_query = "INSERT INTO images (link) VALUES ('$new_link')";

    $stmt = $pdo->prepare($sql_query);
    $stmt->execute();
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



