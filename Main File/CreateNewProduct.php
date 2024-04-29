<?php
session_start();

require_once "Connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["name"]) && isset($_POST["type"]) && isset($_POST["price"]) && isset($_POST["cost"]) && isset($_POST["stock"]) && isset($_POST["description"])) {
        // Extract form data
        $name = $_POST["name"];
        $type = $_POST["type"];
        $price = $_POST["price"];
        $cost = $_POST["cost"];
        $stock = $_POST["stock"];
        $weight = $_POST["weight"];
        $size = $_POST["size"];
        $description = $_POST["description"];
        $color = $_POST["color"];

        // Check if file is uploaded successfully
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        // Extract file name
        $imageFileName = pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME);
        // // Move uploaded file to desired location
        // $targetDir = "../Images/Products/";
        // $targetFilePath = $targetDir . $imageFileName;
        // move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);

        // Move uploaded file to desired location
        $targetDir = "../Images/Products/";
        $targetFilePath = $targetDir . basename($imageFileName);
        move_uploaded_file($_FILES["image"]["tmp_name"],$targetDir.$imageFileName);

        // Insert product details into database
        try {
            $stmt = $pdo->prepare("INSERT INTO Product (P_Name, P_Type, P_Price, P_Cost, P_Stock, P_Description, P_Color, P_Weight, P_Size, P_Image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$name, $type, $price, $cost, $stock, $description, $color, $weight, $size, $imageFileName]);

            // Redirect to a success page or display a success message
            header("Location: AProduct.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Please fill all required fields.";
    }
}
