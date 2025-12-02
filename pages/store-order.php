<?php  
include "../config.php";

session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Ensure user is logged in
    if (!isset($_SESSION["user_id"])) {
        echo "User not logged in.";
        exit();
    }

    $user_id = $_SESSION["user_id"];  // <-- get the logged-in user ID

    // Sanitized Inputs
    $product = $_POST["product"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $total = $_POST["total"];
    $street = $_POST["streetAddress"];
    $barangay = $_POST["barangay"];
    $city = $_POST["city"];
    $province = $_POST["province"];
    $zip = $_POST["zipCode"];
    $phone = $_POST["phoneNumber"];
    $notes = $_POST["deliveryNotes"];

    // Insert with prepared statement
    $sql = "INSERT INTO orders 
        (user_id, product_name, quantity, price, total, street_address, barangay, city, province, zip_code, phone_number, delivery_notes)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "siiddsssssss", 
        $user_id, $product, $quantity, $price, $total,
        $street, $barangay, $city, $province, 
        $zip, $phone, $notes
    );

    if ($stmt->execute()) {
        echo "Order stored successfully!";
    } else {
        echo "Error saving order: " . $stmt->error;
    }

    $stmt->close();
    exit();
}
?>