<?php
// Database credentials from Railway
$host = "yamabiko.proxy.rlwy.net"; // your hostname
$dbname = "railway";                         // your database name
$username = "root";                          // your username
$password = "HqJKeejCYaNgWAQCQtLjbmhmYuEfQWwD";            // your password
$port = 55383;                               // your port

try {
    // Create a PDO connection
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);

    // Set error mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h2>✅ Successfully connected to Railway MySQL database!</h2>";

    // Test query
    $stmt = $pdo->query("SELECT NOW() as server_time;");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "Server time: " . $row['server_time'];

} catch (PDOException $e) {
    echo "<h2>❌ Connection failed:</h2>";
    echo $e->getMessage();
}
?>
