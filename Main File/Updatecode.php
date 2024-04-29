<?php
session_start();
require_once "Connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["name"]) && isset($_POST["type"]) && isset($_POST["price"]) && isset($_POST["cost"]) && isset($_POST["stock"]) && isset($_POST["description"])) {
        // Extract form data
        $product_id = $_POST["product_id"];
        $name = $_POST["name"];
        $type = $_POST["type"];
        $price = $_POST["price"];
        $cost = $_POST["cost"];
        $stock = $_POST["stock"];
        $size = $_POST["size"];
        $weight = $_POST["weight"];
        $color = $_POST["color"];
        $description = $_POST["description"];

        // Check if file is uploaded successfully
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            // Extract file name
            $imageFileName = $_FILES["image"]["name"];
            // Move uploaded file to desired location
            $targetDir = "../Images/Products/";
            $targetFilePath = $targetDir . $imageFileName;
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
        } else {
            // If no new image is uploaded, keep the existing image
            $stmt = $pdo->prepare("SELECT P_Image FROM Product WHERE P_ID = ?");
            $stmt->execute([$product_id]);
            $existingImage = $stmt->fetchColumn();
            $imageFileName = $existingImage;
        }

        // Update product details in the database
        try {
            $stmt = $pdo->prepare("UPDATE Product SET P_Name=?, P_Type=?, P_Price=?, P_Cost=?, P_Stock=?, P_Description=?, P_Color=?, P_Weight=?, P_Size=?, P_Image=? WHERE P_ID=?");
            $stmt->execute([$name, $type, $price, $cost, $stock, $description, $color, $weight, $size, $imageFileName, $product_id]);

            // Redirect to a success page or display a success message
            header("Location: UpdateProduct.php?id=" . $product_id);
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Please fill all required fields.";
    }
}

header("Location: AProduct.php");
?>