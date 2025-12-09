<?php
include("header.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login-register.php");
    exit;
}

// Database connection (separate from config.php to avoid JSON header)
$conn = new mysqli("localhost", "root", "", "kapikapidb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user's order history from database
$user_id = $_SESSION['user_id'];

// Get all orders for this user
$query = "SELECT id, product_name, quantity, price, total, 
          street_address, barangay, city, province, zip_code, 
          phone_number, delivery_notes, created_at
          FROM orders
          WHERE user_id = ?
          ORDER BY created_at DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$orders = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();

// Group orders by date/time (within 5 minutes = same order batch)
$grouped_orders = [];
foreach ($orders as $order) {
    $timestamp = strtotime($order['created_at']);
    $time_key = floor($timestamp / 300) * 300; // Round to 5-minute intervals
    
    if (!isset($grouped_orders[$time_key])) {
        $grouped_orders[$time_key] = [
            'date' => $order['created_at'],
            'items' => [],
            'total' => 0,
            'address' => $order['street_address'] . ', ' . $order['barangay'] . ', ' . $order['city'],
            'phone' => $order['phone_number']
        ];
    }
    $grouped_orders[$time_key]['items'][] = [
        'id' => $order['id'],
        'name' => $order['product_name'],
        'quantity' => $order['quantity'],
        'price' => $order['price']
    ];
    $grouped_orders[$time_key]['total'] += $order['total'];
}

// Sort by most recent first
krsort($grouped_orders);
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="icon" type="image/png" href="../images/logo-nobg.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Comic+Neue&family=Quicksand:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <title>KapiKapi Cafe - Profile</title>
    </head>
    <body> 

           <main class="profile-page">
                <div class="profile-orders-container">
                    <div class="profile-card">
                        <h1>🐾 My Profile</h1>
                        <img src="../images/logo-nobg.png" alt="Capybara" class="capy-img">
                        <h2>Welcome, <?= htmlspecialchars($_SESSION['name']) ?>!</h2>
                        <p>Manage your account settings below. Keep it chill like a capybara. 🛋️☕</p>

                        <div class="profile-actions">
                            <a href="update-password.php" class="btn">Update Password</a>
                            <a href="delete-account.php" class="btn delete-btn" onclick="return confirm('Are you sure you want to delete your account? This cannot be undone.')">Delete Account</a>
                        </div>
                    </div>

                    <div class="orders-card">
                        <h1 class="orders-header">📦 Order History</h1>
                        
                        <?php if (count($grouped_orders) > 0): ?>
                            <?php 
                            $order_number = count($grouped_orders);
                            foreach ($grouped_orders as $time_key => $order): 
                            ?>
                                <div class="order-item">
                                    <div class="order-header-section">
                                        <div>
                                            <div class="order-id">Order #<?= str_pad($order['items'][0]['id'], 5, '0', STR_PAD_LEFT) ?></div>
                                            <div class="order-date"><?= date('F j, Y - g:i A', strtotime($order['date'])) ?></div>
                                        </div>
                                    </div>
                                    <div class="order-items-section">
                                        <div class="order-items-list">
                                            <?php foreach ($order['items'] as $item): ?>
                                                • <?= htmlspecialchars($item['name']) ?> x<?= $item['quantity'] ?><br>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="order-footer-section">
                                        <span class="order-total">Total: ₱<?= number_format($order['total'], 2) ?></span>
                                    </div>
                                </div>
                            <?php 
                                $order_number--;
                            endforeach; 
                            ?>
                        <?php else: ?>
                            <div class="empty-orders">
                                <div class="empty-orders-icon">🛒</div>
                                <p>No orders yet! Start browsing our menu.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </main>

        <?php include("./footer.php");?>
    </body>
    </html>