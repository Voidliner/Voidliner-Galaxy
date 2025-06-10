<?php
function voidliner_create_account($pdo, $username, $password, $tableName = "voidliner_accounts") {
    try {
        // Sanitize table name
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName);

        // Check if username already exists
        $stmt = $pdo->prepare("SELECT * FROM $tableName WHERE Username = :username");
        $stmt->execute([':username' => $username]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            echo json_encode([
                "status" => "error",
                "message" => "Username already exists."
            ]);
        } else {

        // Generate a unique CustomID
        $customId = "VL_" . date("Ymd_His") . "_" . rand(1000, 9999);

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert new account
        $stmt = $pdo->prepare("
            INSERT INTO $tableName (CustomID, Username, Password)
            VALUES (:custom_id, :username, :password)
        ");
        $stmt->execute([
            ':custom_id' => $customId,
            ':username' => $username,
            ':password' => $hashedPassword
        ]);
         voidliner_create_account_table($pdo, $customId); 
        echo json_encode([
            "status" => "success",
            "message" => "Created $username account.",
            "custom_id" => $customId
        ]);

        }
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to create account: " . $e->getMessage()
        ]);
    }
}
?>
