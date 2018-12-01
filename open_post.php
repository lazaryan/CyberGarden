<?php
$id = $_POST['id'];
//$id = 1;
include('conn.php');
$link = get_connection();
$sql = 'SET NAMES utf8';
mysqli_query($link, $sql);
$sql = "SELECT * FROM `teachers` WHERE `id`=$id";
$res = mysqli_query($link, $sql);
if (mysqli_num_rows($res) <= 0)
{
    echo json_encode(array(
        'error' => 'Нет объявления с таким идентефикатором'
        ));
    exit();
}
else
{
    $row = $res->fetch_assoc();
    $post = array();
    $post['title'] = $row['title'];
    include('db.php');
    $post['category'] = get_category_by_id($link, $row['category_id']);
    $post['text'] = $row['description'];
    echo json_encode($post);
}