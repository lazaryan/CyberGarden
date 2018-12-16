<?php

session_start();
if (isset($_SESSION['id']))
{
    $title = $_POST['title'] or die('Ошибка получения данных');
    $category = $_POST['category'] or die('Ошибка получения данных');
    $text = $_POST['description'] or die('Ошибка получения данных');
    //$title = 'Репетитор по математике';
    //$category = 'Репетиторство';
    //$text = 'Математика, абрикос, сердце, енот, темнота, арбуз, заря, якорь, речь, червь, вол.';
    include('conn.php');
    include('db.php');
    $link = get_connection();
    $sql = 'SET NAMES utf8';
    mysqli_query($link, $sql);
    $category = get_id_by_category($link, $category);
    $id = $_SESSION['id'] or die('Ошибка сессии');
    $sql = "INSERT INTO `teachers`(`creator_id`, `title`, `category_id`, `description`) VALUES ($id, '$title', '$category', '$text')";
    mysqli_query($link, $sql) or die('Ошибка работы с базой данных');

   
}
else
{
    header('Location: /');
}