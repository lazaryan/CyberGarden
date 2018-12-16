<?php
//$id = $_POST['id'] or die('Ошибка получения данных');
$id = 5;
if (!isset($_SESSION['id']))
{
    header('Location: main');
}
include('conn.php');
include('db.php');
$link = get_connection();
if (has_rights($link, $id))
{
    $sql = "DELETE FROM `teachers` WHERE `id`=$id";
    mysqli_query($link, $sql) or die('Ошибка работы с базой данных');
}