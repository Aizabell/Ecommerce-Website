<?php
session_start();
require_once "Connect.php";

$C_Card = $_POST['card'];
$C_Sec = $_POST['security'];

$visasql = "UPDATE `Customer` SET `C_VISA` = :visa, `C_SecurityNum` = :securityNum WHERE `C_UserName` = :userId";

try {
    // Prepare the SQL statement
    $visa_stmt = $pdo->prepare($visasql);

    // Bind parameters
    $visa_stmt->bindParam(':visa', $C_Card);
    $visa_stmt->bindParam(':securityNum', $C_Sec);
    $visa_stmt->bindParam(':userId', $_SESSION['user']); // Assuming $_SESSION['user'] contains the user's ID

    // Execute the statement
    $visa_stmt->execute();

    // Output success message
    echo "Records updated successfully";
} catch (PDOException $e) {
    // Output error message
    echo "Error: " . $e->getMessage();
}

header('Location: CheckOut.php');
