<?php
include __DIR__ . '/src/GenerateImage.php';

if ((empty($_GET['userName'])) && (empty($_GET['userSurname'])))
{
    header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found ');

    exit();
}
else
{
    $name = $_GET['userName'];
    $surname = $_GET['userSurname'];
    $userName = $name . ' ' . $surname;
    $mark = "прошел тест на оценку 5";
    $objectImage = new GenerateImage();
    $objectImage->generate($userName,$mark);
}
