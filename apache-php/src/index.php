<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/session/build_header.php';
?>
<html lang="ru">
<head>
    <title>Главная страница</title>
</head>
<body>
    <header class="header">
        <p class="text"></p>
        <nav class="header_menu">
            <ul class="nav_links">
                <li><a class="nav_link" href="index.html">Home</a> </li>
                <li><a class="nav_link" href="catalogue.php">Store</a> </li>
                <li><a class="nav_link" href="admin.php">Admin</a></li>
                <li><a class="nav_link" href="session_status.php">Session</a></li>
                <li><a class="nav_link" href="/pdf/show_pdf.php">PDF</a></li>
            </ul>
        </nav>
        </nav>
    </header>
    <main> 
    <div class="contianer">
        <div class="calendar">
        <div class="date-time-format">
            <div class="day-text-format">TODAY</div>
            <div class="date-time-value">
                <div class="time-format">00:00:00</div>
                <div class="date-format">23 - november - 2022</div>
            </div>
        </div>
        
        <div class="calendar-header">
            <span class="month-picker" id="month-picker"> May </span>
            <div class="year-picker" id="year-picker">
                <span class="year-change" id="pre-year">
                    <pre><</pre>
                </span>
            <span id="year">2020</span>
            <span class="year-change" id="next-year">
                <pre>></pre>
            </span>
            </div>
        </div>

        <div class="calendar-body">
            
            <div class="calendar-week-days">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="calendar-days">
            </div>
        </div>
        <div class="calendar-footer"></div>
        
        <div class="month-list"></div></div>
        
    </div>
    </main>
</body>
</html>