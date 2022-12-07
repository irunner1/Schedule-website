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

        .margin {
            margin-left: 20px;
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
            margin-top: 20px;
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
        <form id="form" class="form" name="form" action="form.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="form-control">
                <label for="task-name" class="margin">Название задачи</label>
                <input type="text" id="task_name" name="task_name" />
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="task_desc" class="margin">Описание задачи</label>
                <input type="text" id="task_desc" name="task_desc"/>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="task_time" class="margin">Время</label>
                <input type="datetime-local" placeholder="2022-12-05 17:00" id="task_time" name="task_time" />
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="task_marker" class="margin">Цвет маркера</label>
                <br>
                <label class="con"> Желтый
                    <input type="radio" checked="checked" name="radio" id="radio" class="radio" value="Yellow">
                    <span class="checkmark"></span>
                </label>
                <br>
                <label class="con"> Красный
                    <input type="radio" name="radio" class="radio" value="Red" id="radio">
                    <span class="checkmark"></span>
                </label>
                <br>
                <label class="con"> Синий
                    <input type="radio" name="radio" class="radio" value="Blue" id="radio">
                    <span class="checkmark"></span>
                </label>
            </div>
            <p><button type="submit" id="submit">Отправить</button></p>
        </form>
        <?php
            $conn = new mysqli('mysql', 'user', 'password', 'appDB');
            if (isset($_REQUEST['task_name']) && isset($_REQUEST['task_desc']) && isset($_REQUEST['task_time']) && isset($_REQUEST['radio'])) {
                $task_name = $_REQUEST['task_name'];
                $task_desc = $_REQUEST['task_desc'];
                $task_time = $_REQUEST['task_time'];
                $color = $_REQUEST['radio'];
                $user_id = 1;
                $sql = "INSERT INTO user_table (task_name, task_desc, task_time, marker, user_num) values ('$task_name', '$task_desc', '$task_time', '$color', '$user_id');";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));
                echo "Запись добавлена";
            }
        ?>
    </div>
    <script> //валидация формы
        const form = document.getElementById('form');
        const task_name = document.getElementById('task_name');
        const task_time = document.getElementById('task_time');
        var counter = 0;
        
        function validateForm() {
            let tnameValue = document.forms["form"]["task_name"].value;
            let time = document.forms["form"]["task_time"].value;
            time = time.replace('T', ' ');

            if (tnameValue === '') {
                setErrorFor(task_name, 'Это обязательное поле');
            } else {
                setSuccessFor(task_name);
            }

            if(!isDateTime(time)) {
                console.log("false");
                setErrorFor(task_time, 'Неправильный формат времени');
            } else {
                setSuccessFor(task_time);
                console.log("false");
            }
            if (tnameValue === '') {
                return false;
            }
            if (!isDateTime(time)) {
                return false;
            }
        }

        function checkInputs() {
            const tnameValue = task_name.value.trim();
            let timeValue = task_time.value.trim();
            console.log(timeValue);
            timeValue = timeValue.replace('T', ' ');
            console.log(timeValue);

            if (tnameValue === '') {
                setErrorFor(task_name, 'Это обязательное поле');
            } else {
                setSuccessFor(task_name);
            }

            if(!isDateTime(timeValue)) {
                setErrorFor(task_time, 'Неправильный формат времени');
            } else {
                setSuccessFor(task_time);
            }
        }

        function setErrorFor(input, message) {
            const formControl = input.parentElement;
            const small = formControl.querySelector('small');
            formControl.className = 'form-control error';
            small.innerText = message;
        }
        
        function isDateTime(timeValue) {
            return /^\d{4}\-\d{1,2}\-\d{1,2}\ \d{2}\:\d{2}$/.test(timeValue);
        }
        function setSuccessFor(input) {
            const formControl = input.parentElement;
            formControl.className = 'form-control success';
        }
    </script>
</body>
</html>