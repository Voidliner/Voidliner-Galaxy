<?php
function voidliner_login_account($pdo, $username, $password) {
    if ($username && $password) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM Voidliner_Accounts WHERE Username = :username");
            $stmt->execute(['username' => $username]);
            $account = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$account) {
                echo json_encode([
                    "status" => "error",
                    "message" => "Username not found."
                ]);
                return;
            }
            if (password_verify($password, $account['password'])) {
                echo json_encode([
                    "status" => "success",
                    "message" => "Login successful.",   
                    "samples" => "Ediwow",   
                    "custom_id" => $account['customid'],          
                    "samples1" => "Ediwow"   
                ]);
                } else {
                    echo json_encode([
                        "status" => "error",
                        "message" => "Invalid username or password."
                    ]);
                    }

        } catch (PDOException $e) {
                echo json_encode([
                    "status" => "error",
                    "message" => "Login failed: " . $e->getMessage()
                ]);
            }
        } else {
                echo json_encode([
                    "status" => "error",
                    "message" => "Username and password are required."
                ]);
            }
        }
?>