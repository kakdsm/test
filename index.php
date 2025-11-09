<?php
$host = getenv("MYSQLHOST");
$port = getenv("MYSQLPORT");
$db   = getenv("MYSQL_DATABASE");
$user = getenv("MYSQLUSER");
$pass = getenv("MYSQLPASSWORD");

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    echo "✅ Connected successfully!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
