<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/session/build_header.php';
?>
<html lang="ru">
<head>
    <title>Панель админа</title>
</head>
<body>
    <div class="sidenav">
        <div class="top">

            <a href="index.php">
                <span class="fa-stack" style="vertical-align: top; margin-top: 40px;">
                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                    <i class="fa-solid fa-flag fa-stack-1x fa-inverse"></i>
                </span>
            </a> 
            <a href="index.php">
                <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                    <i class="fa-solid fa-calendar fa-stack-1x fa-lg fa-inverse"></i>
                </span>
            </a> 
            <a href="index.php">
                <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                    <i class="fa-regular fa-magnifying-glass fa-stack-1x fa-inverse"></i>
                </span>
            </a> 
            <a href="index.php">
                <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-solid fa-circle fa-stack-2x icon-back"></i>
                    <i class="fa-regular fa-comment fa-stack-1x fa-inverse"></i>
                </span>
            </a>
        </div>
        <div class="bottom">
            <a href="index.php">
                <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                    <i class="fa-regular fa-gear fa-stack-1x fa-inverse"></i>
                </span>
            </a> 
            <a href="index.php">
                <span class="fa-stack" style="vertical-align: top;">
                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                    <i class="fa-regular fa-user fa-stack-1x fa-inverse"></i>
                </span>
            </a>
        </div>
    </div>
        <div class="title">
            <p class="title_text">Список пользователей</p>
        </div>
        <?php
            require_once '_helper.php';
            $mysqli = openmysqli();
            $users = $mysqli->query('select * from ' . 'users');
        ?>
        <table cellspacing="0">
            <tr>
                <th>Номер</th>
                <th>Логин</th>
                <th>Пароль</th>
            </tr>
            <?php 
                foreach ($users as $user) {
                    echo "
                        <tr>
                            <td>{$user['ID']}</td>
                            <td>{$user['name']}</td>
                            <td>{$user['password']}</td>
                        </tr>
                    ";
                }; 
            ?>
        </table>
        <br>
        <div class="btn_link">
            <a class="link" href="index.php">На главную</a>
        </div>
        <div>
            <?php $mysqli->close(); ?>
        </div>
</body>
</html>