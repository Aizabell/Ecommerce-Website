<?php
session_start();
require_once "Connect.php";

if (isset($_SESSION['cart']) && isset($_SESSION['user']) && isset($_SESSION['ID'])) {
    // Start a transaction
    $pdo->beginTransaction();
    print_r("testing");
    try {
        // Insert order into OrderList table
        $orderInsert = "INSERT INTO OrderList (C_ID) VALUES (:customerId)";
        $stmt = $pdo->prepare($orderInsert);
        $stmt->bindParam(':customerId', $_SESSION['ID']);
        $stmt->execute();

        // Retrieve the order ID of the inserted order
        $orderId = $pdo->lastInsertId();

        // Insert order lines into OrderLine table
        $orderLineInsert = "INSERT INTO OrderLine (O_ID, P_ID, O_Quantity) VALUES (:orderId, :productId, :quantity)";
        $stmt = $pdo->prepare($orderLineInsert);

        foreach ($_SESSION['cart'] as $productId => $quantity) {
            $stmt->bindParam(':orderId', $orderId);
            $stmt->bindParam(':productId', $productId);
            $stmt->bindParam(':quantity', $_SESSION['cart'][$productId]['qty']);
            $stmt->execute();
        }

        // Commit the transaction
        $pdo->commit();

        // Clear the cart after successful checkout
        unset($_SESSION['cart']);
        $_SESSION['success_message'] = "Purchase successful!";
        // Output success message
        
    } catch (PDOException $e) {
        // Rollback the transaction on failure
        $pdo->rollBack();
        // Output error message
        
        echo "Error: " . $e->getMessage();
        $_SESSION['error_message'] = "Invalid username or password. Please try again.".$e->getMessage();
    }
} else {
    // Output error message if cart or user data is not set in session
    echo "Error: Cart or user data not found";
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
        /* Center the login message and button */
        .centered {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        /* Style the button */
        .centered button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Change button color on hover */
        .centered button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="centered">
        <?php
        // Display success message if set
        if (isset($_SESSION['success_message'])) {
            echo "<p>{$_SESSION['success_message']}</p>";
            unset($_SESSION['success_message']); // Clear success message
        }

        // Display error message if set
        if (isset($_SESSION['error_message'])) {
            echo "<p>{$_SESSION['error_message']}</p>";
            unset($_SESSION['error_message']); // Clear error message
        }
        ?>
        <button onclick="location.href='Cart.php';">Back to Cart</button>
    </div>

</body>

</html>
