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
$sql = "SELECT * FROM orders";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Order Data</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Delivery Address</th>
                    <th>Zip Code</th>
                    <th>Food Items</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['first_name']; ?></td>
                        <td><?php echo $order['last_name']; ?></td>
                        <td><?php echo $order['gender']; ?></td>
                        <td><?php echo $order['email']; ?></td>
                        <td><?php echo $order['phone_number']; ?></td>
                        <td><?php echo $order['delivery_address']; ?></td>
                        <td><?php echo $order['zip_code']; ?></td>
                        <td><?php echo $order['food_items']; ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
