<?php require_once '../_helper.php';

    $method = $_SERVER['REQUEST_METHOD'];
    $url = $_SERVER['REQUEST_URI'];
    $url_data = parse_url($url);
    switch ($method){
        case 'PUT':
            addItem();
            break;
        case 'GET':
            removeItemByName();
            break;
        case 'POST':
            updateJobTimeByName();
            break;
        case 'DELETE':
            getItemByName();
            break;
        default:
            outputStatus(2, 'Invalid Mode');
    }
    
    function addItem() {
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);
        if (!isset($data['task_name']) || !isset($data['task_time']) || !isset($data['time_desc']) || !isset($data['marker']) || !isset($data['user_num'])) {
            throw new Exception("No input provided");
        }
        $mysqli = openMysqli();
        $task_name = $data['task_name'];
        $task_time = $data['task_time'];
        $task_desc = $data['task_desc'];
        $marker = $data['marker'];
        $user_num = $data['user_num'];

        $result = $mysqli->query("SELECT * FROM user_table WHERE task_name = '{$task_name}';");
        if ($result->num_rows === 1) {
            $message = $task_name . ' already exists';
            outputStatus(1, $message);
        }
        else {
        $query = "INSERT INTO user_table (task_name, task_desc, task_time, marker, user_num)
            VALUES ('" . $task_name . "', '" . $task_time . "', '" . $task_desc . "', '" . $marker . "', '". $user_num . ");";
            $mysqli->query($query);
            $mysqli->close();
            $message = 'Added ' . $task_name . ' with data ' . $task_time;
            outputStatus(0, $message);
        }
    }

    function removeItemByName() {
        if (!isset($_GET['task_name'])) {
            throw new Exception("No input provided");
        }
        $mysqli = openMysqli();
        $taskName = $_GET['task_name'];
        $result = $mysqli->query("SELECT * FROM user_table WHERE task_name = '{$taskName}';");
        if ($result->num_rows === 1) {
            $query = "DELETE FROM user_table WHERE task_name = '" . $taskName . "';";
            $mysqli->query($query);
            $mysqli->close();
            $message = 'Removed ' . $taskName;
            outputStatus(0, $message);
        } else {
            $message = $taskName . ' does not exist';
            outputStatus(1, $message);
        }
    }
    
    function updateJobTimeByName() {
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);
        if (!isset($data['task_name']) || !isset($data['task_time'])) {
            throw new Exception("No input provided");
        }
        $mysqli = openMysqli();
        $taskName = $data['task_name'];
        $taskTime = $data['task_time'];
        $result = $mysqli->query("SELECT * FROM user_table WHERE task_name = '{$taskName}';");
        if ($result->num_rows === 1) {
            $query = "UPDATE user_table SET task_time = " . $taskTime . " WHERE task_name = '" . $taskName . "';";
            $mysqli->query($query);
            $mysqli->close();
            $message = 'Updated ' . $taskName . ' with cost of ' . $taskTime;
            outputStatus(0, $message);
        } else {
            $message = $taskName . ' does not exist';
            outputStatus(1, $message);
        }
    }

    function getItemByName() {
        if (!isset($_GET['task_name'])) {
            throw new Exception("No input provided");
        }
        $mysqli = openMysqli();
        $taskName = $_GET['task_name'];
        $query = "SELECT * FROM user_table WHERE task_name = '{$taskName}';";
        $result = $mysqli->query($query);
        if ($result->num_rows === 1) {
            $json = "";
            foreach ($result as $task) {
                $json = json_encode($task);
            }
            echo $json;
            $mysqli->close();
        } else {
            $message = $taskName . ' does not exist';
            outputStatus(1, $message);
        }
    }
?>