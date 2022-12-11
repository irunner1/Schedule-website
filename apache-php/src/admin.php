<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/session/build_header.php';
?>
<html lang="ru">
<head>
    <title>Панель админа</title>
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
        .button {
            background-color: #735BF2;
            border: 2px solid #735BF2;
            border-radius: 8px;
            color: #fff;
            display: block;
            font-family: inherit;
            font-size: 18px;
            padding: 10px;
            margin-top: 5px;
            width: 50%;
            cursor: pointer;
            transition: background-color 0.5s ease 0s;
            text-align: center;
            text-decoration: none;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <div class="block">
    
        <div class="center">
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
        <div class="center">
            <a class="button" href="index.php">На главную</a>
        </div>
    </div>

    <div>
        <?php $mysqli->close(); ?>
    </div>
</body>
</html>