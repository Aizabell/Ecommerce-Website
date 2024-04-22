<?php
session_start();
require_once "Connect.php";

// $username = "Admin";
// $password = "ad123";

$username = $_POST['username'];
$password = $_POST['password'];

// $username = $_GET['username'];
// $password = $_GET['password'];
// print_r($username);
// print_r($password);

// print_r($password);
// print_r($_SESSION['$user']);
// print_r($_SESSION['$role']);

$customer_query = "SELECT * FROM Customer WHERE C_UserName = :username AND C_Password = :password";
$admin_query = "SELECT * FROM Admin WHERE A_Name = :username AND A_Password = :password";
try {
    $customer_stmt = $pdo->prepare($customer_query);
    $customer_stmt->bindParam(':username', $username);
    $customer_stmt->bindParam(':password', $password);
    $customer_stmt->execute();

    $admin_stmt = $pdo->prepare($admin_query);
    $admin_stmt->bindParam(':username', $username);
    $admin_stmt->bindParam(':password', $password);
    $admin_stmt->execute();


    if ($customer_stmt->rowCount() == 1) {
        $row = $customer_stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $row['C_UserName'];
        $_SESSION['role'] = 'customer';
        // print_r($row);
        // print_r($customer_stmt->rowCount());

        print_r($_SESSION['user']);
        print_r($_SESSION['role']);
        echo "Customer login successful";
    } else if ($admin_stmt->rowCount() == 1) {
        $row = $admin_stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $row['A_Name'];
        $_SESSION['role'] = 'admin';
        echo "Admin login successful";
    } else {
        echo "Invalid credentials";
    }
} catch (PDOException $error) {
    echo $error->getMessage();
}

// $_SESSION = array();

// Destroy the session.
// session_destroy();

// // Redirect to homepage after logout
// header("Location: LoginTest.php");
// exit();



?>

<form id="signin-form" action="LoginTest.php" class="tabcontent active" name="SignIn" method="POST">
    <div class="form-group">
        <label for="signin-username">Username:</label>
        <input type="text" id="signin-username" name="username" required>
    </div>
    <div class="form-group">
        <label for="signin-password">Password:</label>
        <input type="password" id="signin-password" name="password" required>
    </div>
    <button type="submit" name="submit" class="btn">Sign In</button>
    <p>Don't have an account? <a href="#" id="signin-toggle">Sign Up</a></p>
</form>

<form action="LoginTest.php?username=harry&password=123" method="POST">
    <button type="submit" name="submit" class="btn">test</button>

</form>
<form action="LoginTest.php?username=Admin&password=ad123" method="POST">
    <button type="submit" name="submit" class="btn">test</button>

</form>