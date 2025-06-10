<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Handle preflight OPTIONS request and exit early
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
require_once 'voidliner_connect_to_database.php';
require_once 'voidliner_setup_database.php';
require_once 'voidliner_get_api.php';
require_once 'voidliner_apply_company.php';
require_once 'voidliner_create_table.php';
require_once 'voidliner_create_account.php';
require_once 'voidliner_create_job.php';
require_once 'voidliner_create_location.php';
require_once 'voidliner_get_tables.php';
require_once 'voidliner_get_table_data.php';
require_once 'voidliner_get_jobs.php';
require_once 'voidliner_get_location.php';
require_once 'voidliner_delete_table.php';
require_once 'voidliner_describe_table.php';
require_once 'voidliner_insert_data.php';
require_once 'voidliner_login.php';
require_once 'voidliner_delete_account.php';

$pdo = voidliner_connect_to_database();
voidliner_api_handler($pdo);
?>