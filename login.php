<?php
if (isset($_SESSION['id']))
{
    header('Location: main');
}
include('conn.php');
include('db.php');
$link = get_connection();
$email = $_POST['email'] or die('Ошибка получения данных');
//$email ='user@qwe.sfb';
$password = $_POST['password'] or die('Ошибка получения данных');
//$password = 'qwer1234';
$sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
$res = mysqli_query($link, $sql);
if (mysqli_num_rows($res) > 0)
{
    session_start();
    $_SESSION['id'] = get_id_by_email($link, $email);
    header('Location: main');
}
else
{
    echo 'Проверьте введенные данные.';
}