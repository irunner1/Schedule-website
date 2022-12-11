<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/session/build_header.php';
?>
<html lang="ru">
<head>
    <title>Главная страница</title>
    <style>
        body {
            background-color: #59a0b6;
            font-family: 'Open Sans', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 400px;
            max-width: 100%;
        }
        .inner {
            padding: 30px 40px;	
        }
        .settings-title {
            padding: 10px;
            font-family: var(--font-family);
            font-size: 20px;
            color: var(--text);
        }
        .inpt {
            border: 2px solid #f0f0f0;
            border-radius: 8px;
            display: block;
            font-family: inherit;
            font-size: 14px;
            padding: 10px;
            width: 100%;
        }
        .inpt:focus {
            outline: 0;
            border-color: #777;
        }
        .button {
            background-color: #735BF2;
            border: 2px solid #735BF2;
            border-radius: 8px;
            color: #fff;
            display: block;
            font-family: inherit;
            font-size: 16px;
            padding: 10px;
            margin-top: 5px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.5s ease 0s;
        }
        .kl {
            text-decoration: none;
            text-align: center;
        }
        .link {
            color: transparent;
        }
        .f {
            display: flex;
            flex-direction: row;
        }
    </style>
</head>
<body>
    <div class="sidenav">
        <div class="top">
            <a href="main.php">
                <span class="fa-stack" style="vertical-align: top; margin-top: 40px;">
                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                    <i class="fa-solid fa-house fa-stack-1x fa-inverse"></i>
                </span>
            </a>
            <a href="index.php">
                <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                    <i class="fa-solid fa-calendar fa-stack-1x fa-lg fa-inverse"></i>
                </span>
            </a>
            <a href="form.php">
                <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-solid fa-circle fa-stack-2x icon-back"></i>
                    <i class="fa-solid fa-circle-plus fa-stack-1x fa-inverse"></i>
                </span>
            </a>                
        </div>
        <div class="bottom">
            <a href="settings.php">
                <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                    <i class="fa-solid fa-gear fa-stack-1x fa-inverse"></i>
                </span>
            </a>
            <?php
                if ($_SESSION['user_id'] == 0) {
                    echo '<a href="account_sign_in.php">';
                }
                else {
                    echo '<a href="account.php">';
                }
            ?>
                <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                    <i class="fa-solid fa-user fa-stack-1x fa-inverse"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="inner">
            <div class="f">
                <div class="settings-title"> username: </div>
                <?php
                    $conn = new mysqli('mysql', 'user', 'password', 'appDB');
                    $mysqli = openmysqli();
                    $mysqli->set_charset('utf8mb4');
                    $result = $mysqli->query("select name from users where id=" . $_SESSION['user_id']);
                    if ($result->num_rows > 0) {
                        foreach ($result as $good) {
                            echo '<div class="settings-title">' .  $good['name'] . '</div>';
                        }
                    }
                ?>
            </div>
            <div class="f">
                <div class="settings-title"> name: </div>
                <?php 
                    echo '<div class="settings-title">' . $_SESSION['login'] . '</div>';
                ?>
            </div>
            <a class="button kl" href='index.php?quit=true'>Выйти</a>
        </div>
    </div>
</body>
</html>