<?php
$host = 'localhost';
$dbname = 'poojitha';
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    try {
        $stmt->execute();
        echo "Registration successful. You can now <a href='login.html'>login</a>.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
