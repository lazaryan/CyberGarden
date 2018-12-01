<?php
function get_connection()
{
    $conf = parse_ini_file('db_conf.ini');
    $link = mysqli_connect($conf['host'], $conf['user'], $conf['pass'], $conf['db']);
    return $link;
}