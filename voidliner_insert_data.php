<?php
function voidliner_insert_data($pdo, $tableName, $data, $data1) {

    try {
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName);
        $sql = "INSERT INTO \"$tableName\" (category, content) VALUES (:data, :data1)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':data' => $data, 
            ':data1' => $data1
        ]);

        echo json_encode([
            "status" => "success",
            "message" => "Data inserted into $tableName",
            "company_message" => "Hired"
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to insert data: " . $e->getMessage()
        ]);
    }
}
?>
