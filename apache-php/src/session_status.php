<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/session/build_header.php';
?>
<html lang="en">

<head>
    <title>Статус сессии</title>
    <style> 
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .block {
            overflow: hidden;
            width: 500px;
            max-width: 100%;
        }
    </style>
</head>

<body>
    <main>
        <div class="block">
            <div class="text">
            <?php
                $_SESSION['views']++;
                $current_theme = $_SESSION['theme'] ? 'black' : 'white';
                echo "Your session ID: " . session_id() . "<br>";
                echo "You have visited this page: {$_SESSION['views']} times<br>";
                echo "Color Theme: {$current_theme}<br>";
                echo "ID: " . $_SESSION['user_id'] . "<br>";
                echo "name: ". $_SESSION['login'];
            ?>
            <br>
            <div>
                <a class="main-button" href="index.php">На главную</a>
            </div>
        </div>
    </main>
</body>
</html>