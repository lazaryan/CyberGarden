<!doctype html>
<html lang="en">
<head>
    <meta   charset="UTF-8" />
<meta   name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<meta   http-equiv="X-UA-Compatible"
        content="ie=edge" />

<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <title>Main</title>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/register.css">
</head>
<body id="body">
<nav class="nav nav_between">
    <div class="nav__logo">
        <img src="img/Icon.png" alt="">
    </div>
    <div class="nav__search">
        <div class="search">
            <input type="text" id="searchText" name="search" class="nav__input" required>
            <select name="" id="navSelect" class="nav__select">
                <option value="Все">Все</option>
            </select>
            <button class="search__active" value="Поиск" id="searchAction">Поиск</button>
        </div>
    </div>
    <div class="nav__log">
        <?php
            //session_start();
            if (isset($_SESSION['id']))
            {
                echo '<a class="nav__sign-out" id="signOut" href="./logout">Sign Out</a>';
            }
            else
            {
                echo ' <a class="nav__sign-in" id="signIn" href="./login">Sign In</a>';
            }
        ?>
        <!--<button class="nav__sign-in" id="signIn">Sign In</button>
        <button class="nav__sign-out" id="signOut">Sign Out</button>
        -->
        <a href="./teachprofile.html" class="nav__sign-out" >Вход</a>
    </div>
</nav>
<script src="js/nav.js" defer></script>
<main class="main">
    <div class="container">
    <div class="main__notification"></div>
    </div>
</main>
<script src="js/main.js" async></script>
    <img src="img/meowtwo.png" id="meowtwo" class="image" style="top: 12vh">
    <img src="img/megaman.png" id="megaman" class="image">
    <img src="img/lapras.png" id="lapras" class="image" style="top: 25vh; left: 90%;">
    <img src="img/mario.png" id="mario" class="image" style="left: 30px">
    <img src="img/star.png" id="star" class="image" style="top: 50vh; left: 93%;">
    <img src="img/Tottoro.png" id="tottoro" class="image" style="top: 14vh; left: 10vw;">
    <img src="img/donate.png" id="tottoro" class="image" style="top: 73vh; right: 30px;">
</body>
</html>