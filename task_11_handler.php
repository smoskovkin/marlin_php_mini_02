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


function get_user_by_email($email)
{
    $link = db_query();

    $sql_query = "SELECT * FROM users_2 WHERE email = '$email'";

    $result = mysqli_query($link, $sql_query) or die(mysqli_error($link));

    $row = mysqli_fetch_assoc($result);

    return $row;
}


function add_user ($email, $password) {

    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $link = db_query();

    $sql_query = "INSERT INTO users_2 (email, password) VALUES ('$email', '$hash_password')";

    mysqli_query($link, $sql_query) or die(mysqli_error($link));
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


$email    = $_POST['email'];
$password = $_POST['password'];

$user = get_user_by_email($email);


if ($user) {
    set_flash_message('error', 'Этот эл адрес уже занят другим пользователем');
    redirect_to('.\task_11.php');
}


add_user ($email, $password);

echo "Пользователь добавлен";

