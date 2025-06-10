<?php
function voidliner_create_account_table($pdo, $tableName) {
    $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName);
    try {
        $sql = "
            CREATE TABLE IF NOT EXISTS \"$tableName\" (
            Category VARCHAR(50),
            Value VARCHAR(50)
            );  
        ";
        $pdo->exec($sql);
        echo json_encode([
            "status" => "success",
            "message" => "'$tableName' table created successfully (or already exists)."
                ]);             
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to create '$tableName' table: " . $e->getMessage()
                ]);

            }
        }
?>
