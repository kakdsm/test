<?php
// Database credentials from Railway
$host = "yamabiko.proxy.rlwy.net"; // your hostname
$dbname = "railway";                         // your database name
$username = "root";                          // your username
$password = "HqJKeejCYaNgWAQCQtLjbmhmYuEfQWwD";            // your password
$port = 55383;                               // your port

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);

    echo "✅ Connected to Railway DB!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
