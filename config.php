<?php
    session_start();
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *, Authorization");
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Content-Type: application/json');

    $db_host = "localhost";
    $db_name = "core";
    $db_user = "root";
    $db_password = "";

    date_default_timezone_set('Asia/Bangkok');
    // $currentDate = date("Y-m-d H:i:s");
    // $urlCoreApi = 'http://utwgpa.com/uat/utw-cors-api';
    // $headers = getallheaders();
    $updated_at = date("Y-m-d H:i:s");

    try {
        $db = new PDO("mysql:host={$db_host}; dbname={$db_name}", $db_user, $db_password );
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        $e->getMessage();
    }
?>