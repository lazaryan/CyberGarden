<?php

function get_id_by_category($link, $category)
{
    $sql = "SELECT * FROM `categories` WHERE `category`='$category'";
    //echo $sql . ' ';
    $res = mysqli_query($link, $sql) or die('Ошибка работы с базой данных get_id_by_category');
    if (mysqli_num_rows($res) <= 0)
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
    if (mysqli_num_rows($res) <= 0)
    {
        die('Неправильно введена категория.');
    }
    $category = $res->fetch_assoc()['category'];
    return $category;
}



function teacher_to_card($link, $teacher)
{
    $category = get_category_by_id($link, $teacher['category_id']);
    return array(
        'id' => $teacher['id'],
        'title' => $teacher['title'],
        'category' => $category,
        'text' => $teacher['description']
    );
}

function get_id_by_name($link, $name)
{
    $sql = "SELECT * FROM `users` WHERE `name`='$name'";
    $res = mysqli_query($link, $sql) or die('Ошибка работы с базой данных get_id_by_name');
    if (mysqli_num_rows($res) <= 0)
    {
        die('Пользователя с такими данными не существует.');
    }
    $id = $res->fetch_assoc()['id'];
    return $id;
}

function post_exists($link, $id)
{
    $sql = "SELECT * FROM `teachers` WHERE `id`=$id";
    $res = mysqli_query($link, $sql);
    if (mysqli_num_rows($res) <= 0)
    {
        die('Не существует объявления с таким id');
    }
}

function has_rights($link, $post_id)
{
    session_start();
    if (post_exists($link, $post_id))
    {
        $sql = "SELECT * FROM `teachers` WHERE `id`=$post_id";
        $res = mysqli_query($link, $sql);
        $res = $res->fetch_assoc();
        //session_start();
        if ($_SESSION['id'] == $res['creator_id'])
        {
            return true;
        }
    }
    return false;
}