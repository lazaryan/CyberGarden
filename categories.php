<?php
include('conn.php');
$link = get_connection();
$sql = "SET NAMES utf8";
mysqli_query($link, $sql);
$sql = "SELECT * FROM `categories`";
$res = mysqli_query($link, $sql);
$categories = array();
while ($row = $res->fetch_assoc())
{
    array_push($categories, $row['category']);
}
echo json_encode($categories);