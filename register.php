<?php
include('conn.php');
include('db.php');
$link = get_connection();
$sql = 'SET NAMES utf8';
mysqli_query($link, $sql) or die('Ошибка работы с языком');
$name = $_POST['name'] or die('Ошибка получения данных');
$email = $_POST['email'] or die('Ошибка получения данных');
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    echo json_encode(array(
        'error' => 'Неверный email '
        ));
    exit();
}
$password = $_POST['password'] or die('Ошибка получения данных');
$is_teacher = $_POST['state'] or die('Ошибка получения данных');
$sql = "SELECT * FROM `users` WHERE `email`='$email'";
$res = mysqli_query($link, $sql);
if (mysqli_num_rows($res) > 0)
{
    die('Пользователь с таким e-mail уже зарегистрировн.');
    exit(0);
}
if ($is_teacher == 'on')
{
    $is_teacher = 1;
}
else
{
    $is_teacher = 0;
}
$sql = "INSERT INTO `users` (`name`, `email`, `password`, `is_teacher`) VALUES ('$name', '$email', '$password', $is_teacher)";
mysqli_query($link, $sql) or die('Ошибка регистрации');
session_start();
$_SESSION['id'] = get_id_by_email($link, $email) or die('Ошибка работы с сессией');
header('Location: /');