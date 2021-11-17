<?php

include 'functions.php';

/*Задание 9, 10*/

function get_message_from_db($message)
{
    $link      = db_query();
    $sql_query = "SELECT * FROM some_table WHERE text_field = '$message'";
    $result = mysqli_query($link, $sql_query) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);

    return $row;
}


function add_message_to_db($message)
{
    $link      = db_query();
    $sql_query = "INSERT INTO some_table VALUES (NULL, '$message')";
    mysqli_query($link, $sql_query) or die(mysqli_error($link));

    echo 'Данные успешно добавлены';
}


function set_flash_message($name, $message)
{
    session_start();

    $_SESSION[$name] = $message;
}


function redirect_to($path)
{
    header("Location: $path");

    exit;
}


/*
 * Правильнее все выше было бы вынести в functions.php наверное? Или хотя бы часть.
 * */

if ( ! ($_SERVER['REQUEST_METHOD'] == 'POST')) {
    die('Форма не была отправлена');
}

$message = $_POST['some_text_field'];

if (get_message_from_db($message)) {

    set_flash_message('error', 'You should check in on some of those fields below.');

    redirect_to('.\task_10.php');
}

add_message_to_db($message);