<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Testing database connection...<br>";

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=globentech_db;charset=utf8mb4",
        "root",
        "",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
    echo "✅ Database connection successful!<br>";
    
    // Test if users table exists
    $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    $count = $stmt->fetchColumn();
    echo "✅ Users table exists with {$count} users<br>";
    
    // Try to get a user
    $stmt = $pdo->query("SELECT * FROM users WHERE email = 'admin@globentech.com'");
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        echo "✅ Test user found: " . $user['full_name'] . "<br>";
    } else {
        echo "❌ Test user NOT found - database may not be imported correctly<br>";
    }
    
} catch (PDOException $e) {
    echo "❌ Database connection failed: " . $e->getMessage();
}
?>