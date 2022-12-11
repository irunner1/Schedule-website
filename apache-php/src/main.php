<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/session/build_header.php';
?>
<html lang="ru">
<head>
    <title>Главная страница</title>
    <style> 
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            padding: 20px;
            overflow: hidden;
            width: 700px;
            max-width: 100%;
            text-align: justify;

        }
        .main-title {
            padding: 10px;
            text-align: center;
            font-size: 20px;
            color: var(--text)
        }
        .main-subtitle {
            padding: 10px;
            font-size: 20px;
            color: var(--text)
        }
        .main-note {
            padding: 10px;
            text-align: center;
            font-size: 20px;
            color: var(--text)
        }
        .main-button {
            margin-top: 30px;
        }
    </style>
</head>
<body>   
    <div class="main">
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
            <div class="main-title"> Создавайте свои расписания и планируйте дела! </div>
            <div class="main-subtitle"> Серсис планирования времени поможет вам в этом. Чтобы воспользоваться сервисом войдите в аккаунт </div>
            <div class="main-note"> Приятного использования! </div>
            <a class="main-button" href="account_sign_in.php"> Войти </a>
        </div>
        
    </div>
</body>
</html>