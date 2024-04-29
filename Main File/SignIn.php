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
        $_SESSION['ID'] = $row['C_ID'];
        $_SESSION['user'] = $row['C_UserName'];
        $_SESSION['role'] = 'customer';
        $_SESSION['acc'] = $row;
        // print_r($row);
        // print_r($customer_stmt->rowCount());
        // print_r($_SESSION['user']);
        // print_r($_SESSION['role']);
        // echo "Customer login successful";

        $_SESSION['success_message'] = "Login successful!";

        // header("Location: Home.php");
    } else if ($admin_stmt->rowCount() == 1) {
        $row = $admin_stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['ID'] = $row['A_ID'];
        $_SESSION['user'] = $row['A_Name'];
        $_SESSION['role'] = 'admin';
        // echo "Admin login successful";
        $_SESSION['success_message'] = "Login successful!";
        // header("Location: Home.php");
    } else {
        echo "Invalid credentials";
        $_SESSION['error_message'] = "Invalid username or password. Please try again.";
        // header("Location: Home.php");
    }
} catch (PDOException $error) {
    echo $error->getMessage();
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
        <button onclick="location.href='home.php';">Back to Home</button>
    </div>

</body>

</html>