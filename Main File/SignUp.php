<?php
session_start();
require_once "Connect.php";


// Prepare user input
$C_UserName = $_POST['username'];
$C_Password =$_POST['password'];
$C_Gender = $_POST['gender'];
$C_Email = $_POST['email'];
$C_Street = $_POST['street'];
$C_City = $_POST['city'];
$C_Phone = $_POST['phone'];
// $C_VISA = $_POST['visa'];
// $C_SecurityNum = $_POST['securitynum'];

// Check if user already exists
try {
    $stmt = $pdo->prepare("SELECT * FROM Customer WHERE C_Email = :C_Email AND C_Password = :C_Password");
    $stmt->bindParam(':C_Email', $C_Email);
    $stmt->bindParam(':C_Password', $C_Password);
    $stmt->execute();
    $select_users = $stmt->fetchAll();

    if (count($select_users) > 0) {
        $message[] = 'User already exists!';
    } else {
        // Insert new user
        $stmt = $pdo->prepare("INSERT INTO Customer(C_UserName, C_Password, C_Gender, C_Email, C_Street, C_City, C_Phone) 
                             VALUES(:C_UserName, :C_Password, :C_Gender, :C_Email, :C_Street, :C_City, :C_Phone)");
        $stmt->bindParam(':C_UserName', $C_UserName);
        $stmt->bindParam(':C_Password', $C_Password);
        $stmt->bindParam(':C_Gender', $C_Gender);
        $stmt->bindParam(':C_Email', $C_Email);
        $stmt->bindParam(':C_Street', $C_Street);
        $stmt->bindParam(':C_City', $C_City);
        $stmt->bindParam(':C_Phone', $C_Phone);
        // $stmt->bindParam(':C_VISA', $C_VISA);
        // $stmt->bindParam(':C_SecurityNum', $C_SecurityNum);
        $stmt->execute();
        $message[] = 'Registered successfully!';
        header('location:Home.php');
    }
} catch (PDOException $error) {
    echo $error->getMessage();
}
