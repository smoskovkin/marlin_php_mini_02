<?php


function db_query()
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $name = 'marlin-mini';

    $link = mysqli_connect($host, $user, $pass, $name);
    mysqli_query($link, "SET NAMES 'utf8'");

//    $result = mysqli_query($link, $sql_query) or die(mysqli_error($link));

    return $link;
}


function get_user_by_email($email)
{
    $link      = db_query();
    $sql_query = "SELECT id FROM users WHERE email = '$email'";

    $result = mysqli_query($link, $sql_query) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);

    return $row['id'];
}


function add_user($email, $password)
{
    $link      = db_query();
    $sql_query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    mysqli_query($link, $sql_query) or die(mysqli_error($link));

    return mysqli_insert_id($link);
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


function login($email, $password)
{
    $link      = db_query();
    $sql_query = "SELECT * FROM users WHERE (email = '$email') AND (password = '$password')";
    $result = mysqli_query($link, $sql_query) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);

    if ( ! ($email == $row['email'] && $password == $row['password'])) {
        return false;
    }

    $_SESSION['user']['id']       = $row['id'];
    $_SESSION['user']['email']    = $row['email'];
    $_SESSION['user']['password'] = $row['password'];
    $_SESSION['user']['username'] = $row['username'];
    $_SESSION['user']['role']     = $row['role'];

    return true;
}


function is_logged($user)
{
    if ( ! isset($user)) {
        return false;
    }

    return true;
}


function is_admin($user)
{
    if ( ! ($user['role'] == 'admin')) {
        return false;
    }

    return true;
}


function get_all_users()
{
    $link      = db_query();
    $sql_query = "SELECT * FROM users";
    $result = mysqli_query($link, $sql_query) or die(mysqli_error($link));

    return $result;
}