<?php
$id = $_POST['id'] or die('Ошибка получения данных');
$title = $_POST['title'] or die('Ошибка получения данных');
$category = $_POST['category'] or die('Ошибка получения данных');
$text = $_POST['description'] or die('Ошибка получения данных');

if (!isset($_SESSION['id']))
{
    header('Location: main');
}
include('conn.php');
include('db.php');
$link = get_connection();
if (has_rights($link, $id))
{
    $category_id = get_id_by_category($category)
    $sql = "UPDATE `teachers` 
    SET `title`=$title,
    `category_id`=$category_id,
    `description`=$text 
    WHERE `id`=$id";
    mysqli_query($link, $sql) or die('Ошибка работы с базой данных');
}