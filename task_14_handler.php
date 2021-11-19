<?php


session_start();

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
    $link      = db_query();
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


if ( ! (isset($user) && password_verify($password, $user['password'])) ) {
    set_flash_message('error', 'Неверный логин или пароль');

    redirect_to('./task_14.php');
}

$_SESSION['user'] = $user;

redirect_to('./task_14_1.php');


