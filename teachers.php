<?php
include('conn.php');
include('db.php');
$link = get_connection();
$sql = 'SET NAMES utf8';
mysqli_query($link, $sql) or die('Ошибка работы с языком');
if (isset($_POST['category']) and $_POST['category'] != 'Все') 
{
    $category = $_POST['category'];
    $id = get_id_by_category($link, $category);
    $sql = "SELECT * FROM `teachers` WHERE `category_id`=$id";  
    $res = mysqli_query($link, $sql) or die('Ошибка работы с базой данных');
    $teachers = array();
    while ($row = $res->fetch_assoc())
    {
        array_push($teachers, teacher_to_card($link, $row));
    }
    echo json_encode($teachers);
}
else
{
    $sql = "SELECT * FROM `teachers`";
    $teachers = array();
    $res = mysqli_query($link, $sql) or die('Ошибка работы с базой данных');
    while ($row = $res->fetch_assoc())
    {
        array_push($teachers, teacher_to_card($link, $row));
    }
    echo json_encode($teachers); 
}
