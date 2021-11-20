<?php

session_start();

function redirect_to($path)
{
    header("Location: $path");

    exit;
}


unset($_SESSION['user']);

redirect_to('./task_14.php');