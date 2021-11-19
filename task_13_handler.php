<?php

session_start();

$_SESSION['click_counter'] += 1;

header("Location: ./task_13.php");

