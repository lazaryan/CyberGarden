<?php
if (isset($_SESSION['id']))
{
    header('Location: main');
}
include('conn.php');
include('db.php');
$link = get_connection();
$name = $_POST['name'] or die('Ошибка получения данных');
//$email ='user@qwe.sfb';
$password = $_POST['password'] or die('Ошибка получения данных');
//$password = 'qwer1234';
$sql = "SELECT * FROM `users` WHERE `name`='$name' AND `password`='$password'";
$res = mysqli_query($link, $sql) or die('Ошибка работы с базой данных');
if (mysqli_num_rows($res) > 0)
{
    session_start();
    //die(get_id_by_name($link, $name));
    //exit();
    $_SESSION['id'] = get_id_by_name($link, $name);
    echo 'OK';
}
else
{
    die('Ошибка ввода');
}
