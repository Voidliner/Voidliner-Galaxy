<?php
function voidliner_create_location($pdo, $customId, $location, $tableName = "voidliner_location") {
    try {
        // Sanitize table name
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName);

        // Check if username already exists
        $stmt = $pdo->prepare("SELECT * FROM $tableName WHERE CustomID = :customId");
        $stmt->execute([':customId' => $customId]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        // Insert new account
        $stmt = $pdo->prepare("
            INSERT INTO $tableName (CustomID, Location)
            VALUES (:CustomID, :Location)
        ");
        $stmt->execute([
            ':CustomID' => $customId,
            ':Location' => $location   
        ]);

        echo json_encode([
            "status" => "success",
            "message" => "Location Selected",
        ]);

        
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to create account: " . $e->getMessage()
        ]);
    }
}
?>
