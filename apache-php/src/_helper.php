<?php
    session_start();
    if (!isset($_SESSION["theme"]) || !isset($_SESSION["views"]) || !isset($_SESSION["login"]) || !isset($_SESSION["user_id"])) {
        $_SESSION["theme"] = 0;
        $_SESSION["views"] = 0;
        $_SESSION["login"] = ' ';
        $_SESSION["user_id"] = 0;
    }

    function openmysqli(): mysqli {
        $connection = new mysqli('mysql', 'user', 'password', 'appDB');
        return $connection;
    }
    
    function outputStatus ($status, $message) {
        echo '{status: ' . $status . ', message: "' . $message . '"}';
    }

    function generatePass($usrName, $usrPass) {
        $cmd = "htpasswd -nb {$usrName} {$usrPass}";
        exec($cmd, $output);
        $str = implode('', $output);
        $str = preg_replace('/^' . $usrName . ':/', '', $str);
        return $str;
    }
?>