<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/session/build_header.php';
?>
<?php //Для удаления записи
  if (isset($_GET['square'])) {
    require_once '_helper.php';
    $mysqli = openmysqli();
    $mysqli->set_charset('utf8mb4');
    $result = $mysqli->query("delete from user_table where id = " . $_GET['square']);
  }
?>
<html lang="ru">
<head>
    <title>Главная страница</title>
</head>
<body>   
    <div class="main">
        <div class="sidenav">
            <div class="top">

                <a href="session_status.php">
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
                <a href="catalogue.php">
                    <span class="fa-stack" style="vertical-align: top;">
                        <i class="fa-solid fa-circle fa-stack-2x"></i>
                        <i class="fa-solid fa-magnifying-glass fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="admin.php">
                    <span class="fa-stack" style="vertical-align: top;">
                        <i class="fa-solid fa-circle fa-stack-2x icon-back"></i>
                        <i class="fa-solid fa-comment fa-stack-1x fa-inverse"></i>
                    </span>
                </a>                
            </div>
            <div class="bottom">
                <a href="form.php">
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

        <?php
            require_once '_helper.php';
            $mysqli = openmysqli();
            $mysqli->set_charset('utf8mb4');
            $result = $mysqli->query("select * from user_table");
        ?>
        <div class="upcoming">
            <div class="upcoming-title">Предстоящие события</div>
            <?php 
                if ($result->num_rows > 0) {
                    foreach ($result as $good) {
                        echo '<div class="square">
                                <div class="row">
                                    <div class="marker '. $good['marker'] . '"></div>
                                    <div class="square-time">'.
                                        mb_substr($good['task_time'], 11, 5) //Добавить проверку на пустое число
                                    .'</div>
                                    <a class="square-delete" href="index.php?square='. $good['ID'] . '"> X </a>
                                </div>
                                <div class="square-title">' . $good['task_name'] . '</div>
                                <div class="square-describtion">' . $good['task_desc'] . '</div>
                                
                            </div>
                        ';
                    }
                }
                else echo '<div class="upcoming-empty"> Предстоящих событий нет </div>'; 
            ?>  
        </div>

        <div class="contianer">
            <div class="calendar-title"> Календарь </div>
            <div class="calendar">
                <div class="date-time-format">
                    <div class="day-text-format"> TODAY </div>
                    <div class="date-time-value">
                        <div class="time-format"> 00:00:00 </div>
                        <div class="date-format"> 23 - november - 2022 </div>
                    </div>
                </div>
                
                <div class="calendar-header">
                    <div>
                        <span class="month-picker" id="month-picker"> November </span>
                        <span id="year" class="year"> 2020 </span>
                    </div>
                    <div class="year-picker" id="year-picker">
                        <span class="year-change" id="pre-year">
                            <pre> < </pre>
                        </span>
                        <span class="year-change" id="next-year">
                            <pre> > </pre>
                        </span>
                    </div>
                </div>
    
                <div class="calendar-body">
                    <div class="calendar-week-days">
                        <div> Пн </div>
                        <div> Вт </div>
                        <div> Ср </div>
                        <div> Чт </div>
                        <div> Пт </div>
                        <div> Сб </div>
                        <div> Вс </div>
                    </div>
                    <div class="calendar-days">
                    </div>
                </div>
                <div class="calendar-footer"></div>
                
                <div class="month-list"></div>
            </div>
        </div>
    </div>
    <?php
        echo '<script defer>';
        require $_SERVER['DOCUMENT_ROOT'] . "/js/script.js";
        echo '</script>';
    ?>
    <?php $mysqli->close(); ?>
</body>
</html>