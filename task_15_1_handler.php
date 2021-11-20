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


function delete_link_from_db($image_link_id)
{
    $link = db_query();

    $sql_query = "DELETE FROM images WHERE id = '$image_link_id'";

    $result = mysqli_query($link, $sql_query) or die(mysqli_error($link));
}


function redirect_to($path)
{
    header("Location: $path");

    exit;
}


$image_link = $_GET;


delete_link_from_db($image_link['id']);

unlink($image_link['link']);

redirect_to('./task_15_1.php');

