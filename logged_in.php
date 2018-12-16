<?php
session_start();
if (isset($_SESSION['id']))
{
    echo json_encode(
        array(
            'status' => 'OK'
        )
    );
}
else
{
    echo json_encode(
        array(
            'status' => 'NO'
        )
    );
}