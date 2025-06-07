<?php
function voidliner_delete_table($pdo, $tableName) {
    $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName);
    if (!$tableName) {
            echo json_encode([
                "status" => "error",
                "message" => "Missing table name (faction)."
                    ]);
                    exit;
        } else {
        try {
            $sql = "DROP TABLE IF EXISTS \"$tableName\"";
            $pdo->exec($sql);

            echo json_encode([
                "status" => "success",
                "message" => "Table '$tableName' deleted successfully (if it existed)."
            ]);
            return true;
        } catch (PDOException $e) {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to delete table: " . $e->getMessage()
            ]);
            return false;
        }
    }
}


function voidliner_delete_all_tables($pdo) {
    try {
        // Fetch all table names in the public schema
        $stmt = $pdo->query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

        foreach ($tables as $table) {
            // Sanitize table name
            $safeTable = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
            $pdo->exec("DROP TABLE IF EXISTS \"$safeTable\" CASCADE");
        }

        echo json_encode([
            "status" => "success",
            "message" => "All tables deleted successfully.",
            "deleted_tables" => $tables
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to delete tables: " . $e->getMessage()
        ]);
    }
}



