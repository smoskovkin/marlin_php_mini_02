<?php


function add_message($message) {
    session_start();

    $_SESSION['message'] = $message;
}


function redirect_to($path)
{
    header("Location: $path");

    exit;
}


$message = $_POST['message'];


if (!$message) {
    die('Введите сообщение');
}


add_message($message);

redirect_to('.\task_12.php');
