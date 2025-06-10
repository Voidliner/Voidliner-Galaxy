<?php
function voidliner_describe_table($pdo, $tableName) {
    $stmt = $pdo->prepare("
        SELECT column_name, data_type, is_nullable, column_default
        FROM information_schema.columns
        WHERE table_name = :table
          AND table_schema = 'public'
    ");
    $stmt->execute([':table' => $tableName]);
    $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($columns, JSON_PRETTY_PRINT);
}
?>
    