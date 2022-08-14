<?php
    require_once('config.php');
    require_once('resource/header.php');
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $tname = $_POST['tname'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $status = $_POST['status'];

        $table_name = 'user';
        $column = 'tname, fname, lname, email, status';
        $val = '?, ?, ?, ?, ?';

        $query = "INSERT INTO ". $table_name ." (". $column .") VALUES (". $val .")";
        $stmt = $db->prepare($query);
        if($stmt->execute([
            $tname, $fname, $lname, $email, $status
        ])) {
            $items["data"] = [
                "tname" => $tname,
                "fname" => $fname,
                "lname" => $lname,
                "email" => $email,
                "status" => $status,
            ];
            require_once('resource/success.php');
            echo json_encode($items);
        } else {
            require_once('resource/errPram.php');
            echo json_encode($items);
        }
    }
?>