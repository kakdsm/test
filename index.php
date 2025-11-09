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
    echo "✅ Connected successfully!<br>";

    // 1. Create 'users' table if it doesn't exist
    $createTableSQL = "
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            email VARCHAR(100),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB;
    ";
    $pdo->exec($createTableSQL);
    echo "✅ 'users' table ensured.<br>";

    // 2. Insert a sample user (optional)
    $insertSQL = "
        INSERT IGNORE INTO users (username, email)
        VALUES ('testuser', 'testuser@example.com');
    ";
    $pdo->exec($insertSQL);
    echo "✅ Sample user inserted.<br>";

    // 3. Select all users
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h3>Users:</h3>";
    echo "<pre>" . print_r($users, true) . "</pre>";

} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
