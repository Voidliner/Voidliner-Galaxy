<?php
function voidliner_create_job($pdo, $customId, $job, $tableName = "voidliner_joblist") {
    try {
        // Sanitize table name
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName);

        // Check if username already exists
        $stmt = $pdo->prepare("SELECT * FROM $tableName WHERE CustomID = :customId");
        $stmt->execute([':customId' => $customId]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        // Insert new account
        $stmt = $pdo->prepare("
            INSERT INTO $tableName (CustomID, Job)
            VALUES (:CustomID, :Job)
        ");
        $stmt->execute([
            ':CustomID' => $customId,
            ':Job' => $job   
        ]);

        echo json_encode([
            "status" => "success",
            "message" => "Job created",
        ]);

        
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to create account: " . $e->getMessage()
        ]);
    }
}
?>
