<?php

// $dsn = 'mysql:host=localhost;port=3306;dbname=ikonic';
// $username = 'root';
// $password = '';


$port = $_POST['port'];
$database_name = $_POST['database_name'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$localhost = $_POST['localhost'];

$dsn = 'mysql:host=' . $localhost . ';port=' . $port . ';dbname=' . $database_name . '';
$username = $user_name;
$password = $password;

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Extract database name from DSN
preg_match('/dbname=([^;]+)/', $dsn, $matches);
$database_name = $matches[1] ?? 'unknown';

$stmt = $pdo->query("SHOW TABLES");
$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
$data = [];

foreach ($tables as $table_name) {
    $stmt = $pdo->query("SHOW FULL COLUMNS FROM $table_name");
    $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $table_info = [];
    $table_info['table_name'] = $table_name;
    $table_info['columns'] = [];

    foreach ($columns as $column) {
        $column_info = [
            'Field' => $column['Field'],
            'Type' => $column['Type'],
            'Null' => $column['Null'],
            'Default' => $column['Default'],
            'Comment' => $column['Comment']
        ];
        $table_info['columns'][] = $column_info;
    }

    $data[] = $table_info;
}

include('./postmanStub.php');
?>
