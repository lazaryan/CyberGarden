<?php
# session_unset();
if (isset($_SESSION['id']))
{
session_destroy();
header('Location: ./');
}
header('Location: ./');