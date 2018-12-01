<?php
    //include_once "php/settings.php";
    session_start();
    if ($_SERVER["REQUEST_URI"] == "/") {
        $Page = "index";
        $Module = "index";
    } else {
        $URL_Path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $URL_Parts = explode("/", trim($URL_Path, "/"));
        $Page = array_shift($URL_Parts);
        $Module = array_shift($URL_Parts);
        if (!empty($Module)) {
            $Param = array();
            for ($i = 0; $i < count($URL_Parts); $i++)
            {
                $Param[$i] = $URL_Parts[$i];
            }
        }
    }
    if ($Page == "index" and $Module == "index") {
        if (isset($_SESSION['id'])) {
            header('Location: main');
        } else {
            header('Location: register');
        }
    } else {
        switch ($Page) {
            case "register":
                if (isset($_SESSION['id']))
                {
                    include('main.html');
                    //header('Location: main.html');
                }
                else
                {
                    include('index.html');
                    //header('Location: index.html');
                }
                break;
            case "main":
                include('main.html');
                break;
            case 'logout':
                include('logout.php');
                break;
            case 'post':
                include('open_post.php');
                /*
            case "logout":
                include("php/logout.php");
                break;
            case "register":
                include("register.php");
                break;
            case "publication":
                include("publication.php");
                break;
            case "posts":
                include("get_posts.php");
                break;
            case "user":
                include_once("php/get_user.php");
                $userPage = new UserPage();
                $userPage->getUserPage($Module);
                break;
            default:
                echo "404 Error: Page not found";
                break;
                */
        }
        
    }
    
?>