<?php
function voidliner_get_table_data($pdo, $tableName) {
    // Sanitize the table name
    $safeTable = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName);

    try {
        $stmt = $pdo->query("SELECT * FROM \"$safeTable\"");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode([
            "status" => "success",
            "table" => $safeTable,
            "row_count" => count($rows),
            "data" => $rows
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to fetch data from table '$safeTable'"
        ]);
    }
}
?>