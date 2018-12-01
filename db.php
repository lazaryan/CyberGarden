<?php

function get_id_by_category($link, $category)
{
    $sql = "SELECT * FROM `categories` WHERE `category`='$category'";
    //echo $sql . ' ';
    $res = mysqli_query($link, $sql) or die('Ошибка работы с базой данных get_id_by_category');
    if (empty($res))
    {
        die('Неправильно введена категория.');
    }
    $id = $res->fetch_assoc()['id'];
    return $id;
}

function get_category_by_id($link, $id)
{
    $sql = "SELECT * FROM `categories` WHERE `id`=$id";
    $res = mysqli_query($link, $sql) or die('Ошибка работы с базой данных get_category_by_id');
    if (empty($res))
    {
        die('Неправильно введена категория.');
    }
    $category = $res->fetch_assoc()['category'];
    return $category;
}



function teacher_to_card($link, $teacher)
{
    $category = get_category_by_id($link, $teacher['id']);
    return array(
        'id' => $teacher['id'],
        'title' => $teacher['title'],
        'category' => $category,
        'text' => $teacher['description']
    );
}

function get_id_by_email($link, $email)
{
    $sql = "SELECT * FROM `users` WHERE `email`='$email'";
    $res = mysqli_query($link, $sql) or die('Ошибка работы с базой данных get_id_by_email');
    if (empty($res))
    {
        die('Неправильно введена email.');
    }
    $id = $res->fetch_assoc()['id'];
    return $id;
}
