<?php
session_start();
require_once "Connect.php";

$accid = $_GET['id'];
$username = $_GET['username'];
$password = $_GET['password'];
$gender = $_GET['card'];
$phone = $_GET['phone'];
$email = $_GET['email'];
$street = $_GET['street'];
$city = $_GET['city'];

$accupdatesql = "UPDATE `Customer` SET `C_UserName` = :username, `C_Password` = :password, `C_Gender` = :gender, `C_Email` = :email, `C_Phone` = :phone, `C_Street` = :street, `C_City` = :city WHERE `C_ID` = :accid";

// $visasql = "UPDATE `Customer` SET `C_VISA` = :visa, `C_SecurityNum` = :securityNum WHERE `C_UserName` = :userId";

try {
    // Prepare the SQL statement
    $acup_stmt = $pdo->prepare($accupdatesql);

    // Bind parameters
    $acup_stmt->bindParam(':username', $username);
    $acup_stmt->bindParam(':password', $password);
    $acup_stmt->bindParam(':gender', $gender);
    $acup_stmt->bindParam(':email', $email);
    $acup_stmt->bindParam(':phone', $phone);
    $acup_stmt->bindParam(':street', $street);
    $acup_stmt->bindParam(':city', $city);
    $acup_stmt->bindParam(':accid', $accid);

    // Execute the statement
    $acup_stmt->execute();
    $_SESSION['accup']="set";

    // Output success message
    echo "Records updated successfully";
} catch (PDOException $e) {
    // Output error message
    echo "Error: " . $e->getMessage();
}
header("Location: Account.php?id=$accid&username=$C_UserName&password=$C_Password&gender=$C_Gender&email=$C_Email&phone=$C_Phone&street=$C_Street&city=$C_City");

// header('Location: Account.php?id=$accid);