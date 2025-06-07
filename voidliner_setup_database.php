<?php
function voidliner_setup_database($pdo) {
    $tables = [
        "Voidliner_Accounts" => "
            CREATE TABLE IF NOT EXISTS Voidliner_Accounts (
                id SERIAL PRIMARY KEY,
                CustomID VARCHAR(50) NOT NULL UNIQUE,
                Username VARCHAR(50) NOT NULL,
                Password VARCHAR(100) NOT NULL
            );
        ",
        "Voidliner_Joblist" => "
            CREATE TABLE IF NOT EXISTS Voidliner_Joblist (
                CustomID VARCHAR(50) NOT NULL UNIQUE,
                Job VARCHAR(50) NOT NULL
            );
        ",
        "Voidliner_Location" => "
            CREATE TABLE IF NOT EXISTS Voidliner_Location (
                CustomID VARCHAR(50) NOT NULL UNIQUE,
                Location VARCHAR(50) NOT NULL
            );
        ",
        "United_Imperium" => "
            CREATE TABLE IF NOT EXISTS United_Imperium (
                id SERIAL PRIMARY KEY,
                CustomID VARCHAR(50) NOT NULL UNIQUE,
                Job VARCHAR(50) NOT NULL
            );
        ",
        "Stellar_Federation" => "
            CREATE TABLE IF NOT EXISTS Stellar_Federation (
                id SERIAL PRIMARY KEY,
                CustomID VARCHAR(50) NOT NULL UNIQUE,
                Job VARCHAR(50) NOT NULL
            );
        ",
        "Galactic_Consortium" => "
            CREATE TABLE IF NOT EXISTS Galactic_Consortium (
                id SERIAL PRIMARY KEY,
                CustomID VARCHAR(50) NOT NULL UNIQUE,
                Job VARCHAR(50) NOT NULL
            );
        "
    ];

    foreach ($tables as $tableName => $sql) {
        try {
            $pdo->exec($sql);
            echo json_encode([
                "status" => "success",
                "message" => "-'$tableName' created successfully "
            ]);
        } catch (PDOException $e) {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to create '$tableName': " . $e->getMessage()
            ]);
        }
    }
}
?>
