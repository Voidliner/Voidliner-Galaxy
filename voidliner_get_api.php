<?php
function voidliner_api_handler($pdo) {
    $mode = $_GET['mode'];
    $tableName = $_GET['table'] ?? null; 
    $columnName = $_GET['column'] ?? null;
    $data = $_GET['data'] ?? null;
    $customId = $_GET['ID'] ?? null;
    $job = $_GET['job'] ?? null;
    $location = $_GET['location'] ?? null;
    $extraUsername = $_GET['username'] ?? null;
    $extraPassword = $_GET['password'] ?? null;
    $username = $_POST['username'] ?? $extraUsername;
    $password = $_POST['password'] ?? $extraPassword;
    switch ($mode) {
        case 'setup_database':      voidliner_setup_database($pdo); break;
        case 'apply_company':       voidliner_apply_company($pdo, $job, $location); break;
        case 'create_table':        voidliner_create_account_table($pdo, $tableName);  break;
        case 'create_account':      voidliner_create_account($pdo, $username, $password); break;
        case 'create_job':          voidliner_create_job($pdo, $customId, $job); break;
        case 'create_location':     voidliner_create_location($pdo, $customId, $location); break;
        case 'describe':            voidliner_describe_table($pdo, $tableName); break;
        case 'get_tables':          voidliner_get_tables($pdo);   break;
        case 'get_jobs':            voidliner_get_jobs();  break;
        case 'get_location':        voidliner_get_location();  break;
        case 'delete_table':        voidliner_delete_table($pdo, $tableName); break;
        case 'delete_all_tables':   voidliner_delete_all_tables($pdo);  break;
        case 'delete_account':      voidliner_delete_account($pdo, $customId); break;
        case 'delete_account':      voidliner_delete_account($pdo, $customId); break;
        case 'get_table_data':      voidliner_get_table_data($pdo, $tableName); break;
        case 'insert_data':         voidliner_insert_data($pdo, $tableName, $columnName, $data); break;
        case 'login':               voidliner_login_account($pdo, $username, $password); break;
        default: echo json_encode   (["status" => "error", "message" => "Invalid or missing mode."]);  break;
    }
}
