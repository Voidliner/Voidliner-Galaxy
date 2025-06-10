<?php
function voidliner_insert_data($pdo, $tableName, $columnName, $data) {
    try {
        // Sanitize the table and column names
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName);
        $columnName = preg_replace('/[^a-zA-Z0-9_]/', '', $columnName);

        // PostgreSQL uses double quotes for identifiers
        $sql = "UPDATE \"$tableName\" SET \"$columnName\" = :data";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':data' => $data
        ]);

        echo json_encode([
            "status" => "success",
            "message" => "Data updated in $tableName"
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to update data: " . $e->getMessage()
        ]);
    }
}
?>
