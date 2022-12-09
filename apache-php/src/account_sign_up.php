<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/session/build_header.php';
?>
<html lang="ru">
<head>
    <title>Вход</title>
    <style>
        body {
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

        .form {
            padding: 30px 40px;	
        }

        .form-control {
            margin-bottom: 10px;
            padding-bottom: 20px;
            position: relative;
        }

        .form-control label {
            display: inline-block;
            margin-bottom: 5px;
        }

        .form-control input {
            border: 2px solid #f0f0f0;
            border-radius: 8px;
            display: block;
            font-family: inherit;
            font-size: 14px;
            padding: 10px;
            width: 100%;
        }

        .form-control input:focus {
            outline: 0;
            border-color: #777;
        }

        .form-control.success input {
            border-color: #2ecc71;
        }

        .form-control.error input {
            border-color: #e74c3c;
        }

        .form-control i {
            visibility: hidden;
            position: absolute;
            top: 3px;
        }
        .form-control i.fa-certificate{
            color:#59a0b6;
            visibility: visible;
            position: absolute;
            top: 3px;
            left: 0px;
        }

        .form-control.success i.fa-certificate {
            visibility: hidden;
        }
        .form-control.error i.fa-certificate {
            visibility: hidden;
        }
        .form-control.success i.fa-check-circle {
            color: #2ecc71;
            visibility: visible;
        }

        .form-control.error i.fa-exclamation-circle {
            color: #e74c3c;
            visibility: visible;
        }

        .form-control small {
            color: #e74c3c;
            position: absolute;
            bottom: 0;
            left: 0;
            visibility: hidden;
        }

        .form-control.error small {
            visibility: visible;
        }

        .form button {
            background-color: #735BF2;
            border: 2px solid #735BF2;
            border-radius: 8px;
            color: #fff;
            display: block;
            font-family: inherit;
            font-size: 16px;
            padding: 10px;
            /* margin-top: 20px; */
            width: 100%;
            cursor: pointer;
            transition: background-color 0.5s ease 0s;
        }

        .form button:hover {
            background-color: #935BF2;
        }

        .form-control.error input{
            animation: anim .5s;
        }
        .a {
            width: 50px;
            font-style: 15px;
        }
        .account-title {
            padding: 10px;
            font-family: var(--font-family);
            font-size: 18px;
            color: var(--text);
        }
        .account-row {
            display: flex;
            flex-direction: row;
        }
        .account-link {
            padding: 12px 10px 10px 10px;
            font-family: var(--font-family);
            font-size: 15px;
            color: var(--text);
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
            <a href="settings.php">
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
        <form id="form" class="form" name="form" action="account.php" method="post" enctype="multipart/form-data" onsubmit="return validateFormInput()">
            <div class="account-title"> Зарегистрироваться </div>
            <div class="account-row">
                <div class="account-title"> Уже есть аккаунт? </div>
                <a href="account_sigh_in.php" class="account-link"> Войти </a>
            </div>
            <div class="form-control">
                <label for="username" class="account-title"> Имя пользователя </label>
                <input type="text" id="username" name="username" />
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="password" class="account-title"> Пароль </label>
                <input type="password" id="password" name="password"/>
                <small>Error message</small>
            </div>

            <p><button type="submit" id="submit">Зарегистрироваться</button></p>
        </form>
        <?php
            $conn = new mysqli('mysql', 'user', 'password', 'appDB');
            if (isset($_REQUEST['password']) && isset($_REQUEST['username'])) {
                $username = $_REQUEST['username'];
                $hash = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (name, password) values ('$username', '$hash');";
                ?>
                    <script type="text/javascript">
                        window.location.href = 'http://localhost:8082/index.php';
                    </script>
                <?php
            }
        ?>
    </div>
    <script> //валидация формы
        const form = document.getElementById('form');
        const username = document.getElementById('username');
        const password = document.getElementById('password');
        var counter = 0;
        
        function validateFormInput() {
            let name = document.forms["form"]["username"].value;
            let pass = document.forms["form"]["password"].value;

            if (name === '') {
                setErrorFor(username, 'Это обязательное поле');
            }
            else {
                setSuccessFor(username);
            }
            if (pass === '') {
                setErrorFor(password, 'Это обязательное поле');
            }
            else {
                setSuccessFor(password);
            }
            if (name === '') {
                return false;
            }
            if (pass === '') {
                return false;
            }     
        }

        function setErrorFor(input, message) {
            const formControl = input.parentElement;
            const small = formControl.querySelector('small');
            formControl.className = 'form-control error';
            small.innerText = message;
        }
        
        function setSuccessFor(input) {
            const formControl = input.parentElement;
            formControl.className = 'form-control success';
        }
    </script>
</body>
</html>