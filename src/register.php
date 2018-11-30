<?php
include('conn.php');
$link = get_connection();
$sql = 'SET NAMES utf8';
mysqli_query($link, $sql) or die('Ошибка работы с языком');
$name = $_POST['name'] or die('Ошибка получения данных');
$email = $_POST['email'] or die('Ошибка получения данных');
$password = $_POST['password'] or die('Ошибка получения данных');
$is_teacher = $_POST['state'] or die('Ошибка получения данных');
$sql = "SELECT * FROM `users` WHERE `email`=$email";
if (!empty(mysqli_query($link, $sql)))
{
    die('Пользователь с таким e-mail уже зарегестрировн.');
    exit(0);
}
echo $is_teacher;
if ($is_teacher == 'on')
{
    $is_teacher = true;
}
else
{
    $is_teacher = false;
}
$sql = "INSERT INTO `users` (`name`, `email`, `password`, `is_teacher`) VALUES ('$name', '$email', '$password', $is_teacher)";
echo $sql;
mysqli_query($link, $sql) or die('Ошибка регистрации');
header('Location: main.php');