<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        /* Basic CSS styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our E-commerce Store</h1>
        
        <!-- Display some basic information -->
        <p>We offer a wide range of products to meet your needs. Check out our selection below:</p>
        
        <!-- PHP code to fetch and display products -->
        <?php
        // Establishing connection to the database
        $host = 'localhost';
        $user = 'username'; // Your MySQL username
        $password = 'password'; // Your MySQL password
        $database = 'ecommerce'; // Your database name

        $conn = new mysqli($host, $user, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetching products from the database
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Displaying products
            while($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p>Price: $' . $row['price'] . '</p>';
                echo '<p>Description: ' . $row['description'] . '</p>';
                echo '</div>';
            }
        } else {
            echo "No products found.";
        }
        
        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>