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
        .link {
            color: transparent;
        }
    </style>
</head>
<body>
    <div class="sidenav">
        <div class="top">
            <a href="session_status.php">
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
            <a href="#">
                <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                    <i class="fa-solid fa-magnifying-glass fa-stack-1x fa-inverse"></i>
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
            <a href="admin.php">
                <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                    <i class="fa-solid fa-gear fa-stack-1x fa-inverse"></i>
                </span>
            </a>
            <span class="fa-stack" style="vertical-align: top;">
                <i class="fa-solid fa-circle fa-stack-2x"></i>
                <i class="fa-solid fa-user fa-stack-1x fa-inverse"></i>
            </span>
        </div>
    </div>
    <div class="container">
        <div class="inner">
            <?php 
                if ($_SESSION['login'] != ' ') {
                    echo '<div class="settings-title">Добро пожаловать, ' . $_SESSION['login'] . '!</div>';
                } 
            ?>
            <div>
                <input class="inpt" placeholder="Ваше имя">
                <button class="button" onclick="setLogin()"> Задать имя </button>
            </div>
            <div class="settings-title">Сменить тему</div>
            <button class="button" onclick="changeTheme()"> Сменить тему </button>
            <a href="admin.php" class="link"> Админ Панель </a>
        </div>
        
    </div>
</body>
</html>