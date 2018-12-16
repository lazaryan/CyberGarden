<?php
$id = $_POST['id'];
include('conn.php');
include('db.php');
$link = get_connection();
$sql = 'SET NAMES utf8';
mysqli_query($link, $sql);
$sql = "SELECT * FROM `teachers` WHERE `creator_id`=$id";
$res = mysqli_query($link, $sql);
$teachers = array();
while ($row = $res->fetch_assoc())
{
    array_push($teachers, teacher_to_card($link, $row));
}
echo json_encode($teachers); 