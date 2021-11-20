<?php

if (isset($_FILES['img_input'])) {
    $image = $_FILES['img_input'];
} else {
    die('Файл не был загружен');
}

var_dump($_FILES);