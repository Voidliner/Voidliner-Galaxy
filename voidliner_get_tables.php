<?php
function voidliner_get_tables($pdo) {
    try {
        $stmt = $pdo->query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $count = count($tables);

        echo json_encode([
            "status" => "success",
            "count" => $count,
            "tables" => $tables,
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to retrieve tables: " . $e->getMessage()
        ]);
    }
}
