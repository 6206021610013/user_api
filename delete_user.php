<?php
require_once('config.php');
require_once('resource/header.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    try {
        $stmt = $db->prepare("DELETE FROM user WHERE id = ? ");
        $stmt->execute([$id]);
       
        require_once('resource/success.php');
        echo json_encode($items);
    }
    catch(PDOException $e) {
        require_once('resource/empty.php');
        echo json_encode($items);
    }
}
?>