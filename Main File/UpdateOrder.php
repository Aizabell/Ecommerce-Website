<?php
session_start();
require_once "Connect.php";

if (isset($_SESSION['user']) ){
    if (isset($_POST['update_status'])) {
        try {
            // Get the order ID from the form
            $orderId = $_POST['order_id'];

            // Fetch the current status of the order
            $status_sql = "SELECT O_Status FROM OrderList WHERE O_ID = :orderId";
            $status_stmt = $pdo->prepare($status_sql);
            $status_stmt->bindParam(':orderId', $orderId);
            $status_stmt->execute();
            $currentStatus = $status_stmt->fetchColumn();

            // Determine the new status based on the current status
            $newStatus = ($currentStatus === 'CONFIRMED') ? 'PENDING' : 'CONFIRMED';

            // Update the order status in the database
            $update_sql = "UPDATE OrderList SET O_Status = :newStatus WHERE O_ID = :orderId";
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->bindParam(':newStatus', $newStatus);
            $update_stmt->bindParam(':orderId', $orderId);
            $update_stmt->execute();

            // Redirect back to the admin order history page
            header("Location: AOrder.php");
            exit();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        // Redirect if the update status form was not submitted
        header("Location: AOrder.php");
        exit();
    }
} else {
    // Redirect unauthorized users to a suitable page
    header("Location: Unauthorized.php");
    exit();
}
?>