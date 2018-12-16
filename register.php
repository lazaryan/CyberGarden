<?php
include('conn.php');
$link = get_connection();
$sql = 'SET NAMES utf8';
mysqli_query($link, $sql) or die('Ошибка работы с языком');
$name = $_POST['name'] or die('Ошибка получения данных');
$email = $_POST['email'] or die('Ошибка получения данных');
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	die('Неверный email');
}
$password = $_POST['password'] or die('Ошибка получения данных');
$is_teacher = $_POST['state'] or die('Ошибка получения данных');
$sql = "SELECT * FROM `users` WHERE `email`=$email or `name`=$name";
if (!empty(mysqli_query($link, $sql)))
{
    die('Пользователь с таким e-mail уже зарегистрирован.');
    exit(0);
}
//echo $is_teacher;
if ($is_teacher == 'on')
{
    $is_teacher = 1;
}
else
{
    $is_teacher = 0;
}
$sql = "INSERT INTO `users` (`name`, `email`, `password`, `is_teacher`) VALUES ('$name', '$email', '$password', $is_teacher)";
//echo $sql;
mysqli_query($link, $sql) or die('Ошибка регистрации');
//header('Location: ./main.php');
session_start();
include('db.php');
$_SESSION['id'] = get_id_by_name($link, $name);
echo json_encode(array(
'status' => 'OK'
));