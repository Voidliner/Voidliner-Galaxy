<?php
function voidliner_delete_account($pdo, $customId) {
    try {
        if ($customId) {
            $stmt = $pdo->prepare("DELETE FROM Voidliner_Accounts WHERE CustomID = :custom_id");
            $stmt->execute(['custom_id' => $customId]);

            if ($stmt->rowCount() > 0) {
                echo json_encode([
                    "status" => "success",
                    "message" => "Account deleted successfully."
                ]);
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => "No account found with the provided Custom ID."
                ]);
            }
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Custom ID is required to delete an account."
                ]);
            }       
        } catch (PDOException $e) {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to delete account: " . $e->getMessage()
            ]);
        }
    }
?>