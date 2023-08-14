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
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $deliveryAddress = $_POST['deliveryAddress'];
    $zipCode = $_POST['zipCode'];
    $foodItems = implode(', ', $_POST['foodItems']);

    $sql = "INSERT INTO orders (first_name, last_name, gender, email, phone_number, delivery_address, zip_code, food_items) VALUES (:firstName, :lastName, :gender, :email, :phoneNumber, :deliveryAddress, :zipCode, :foodItems)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phoneNumber', $phoneNumber);
    $stmt->bindParam(':deliveryAddress', $deliveryAddress);
    $stmt->bindParam(':zipCode', $zipCode);
    $stmt->bindParam(':foodItems', $foodItems);
    try {
        $stmt->execute();
        echo "Order submitted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
