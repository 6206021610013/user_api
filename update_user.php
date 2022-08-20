<?php
require_once('config.php');
require_once('resource/header.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $tname = $_POST['tname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    try {
        $stmtUpdate = $db->prepare("UPDATE user SET tname = ?, fname = ?, lname = ?, email = ?, status = ?, updated_at = ? WHERE id = ? ");
        $stmtUpdate->execute([$tname, $fname, $lname, $email, $status,  $updated_at, $id]);
        
        $stmtGet = $db->prepare("SELECT * FROM user WHERE id = ? ");
        $stmtGet->execute([$id]);
        $row = $stmtGet->fetch(PDO::FETCH_ASSOC);

        $items["data"] = $row;
        require_once('resource/success.php');
        echo json_encode($items);
    }
    catch(PDOException $e) {
        require_once('resource/errPram.php');
        echo json_encode($items);
    }
}
?>