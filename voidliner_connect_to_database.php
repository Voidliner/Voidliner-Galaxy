<?php

function voidliner_connect_to_database() {
    $host = 'dpg-d0ti432dbo4c739nguq0-a.oregon-postgres.render.com';
    $port = '5432';
    $dbname = 'api_database_n9x1';
    $user = 'api_database_n9x1_user';
    $password = 'ZY2yoYoXypv0HYqJ6zwPxUcQhEBtQYT8';
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Connection failed: " . $e->getMessage()
        ]);
        exit;
    }
}
