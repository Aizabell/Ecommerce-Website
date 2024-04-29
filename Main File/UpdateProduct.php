<?php
session_start();

require_once "Connect.php";

if (isset($_GET['id'])) {
    // Fetch existing product data from the database
    $product_id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM Product WHERE P_ID = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Redirect or display an error message if product ID is not provided
}


?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Home.css">
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Cart.css">
</head>

<body class="textformat colorformat bodyformat">
    <div class="container">
        <?php include 'NormalNavBar.php'; ?>

        <section class="flexpage">
            <div class="cat-title2">
                <a href="#" class="Pagetitle selected">
                    <h2>UPDATE PRODUCT</h2>
                </a>
            </div>
            <div class="cat-title2">
                <a href="AProduct.php" class="Pagetitle btn">Back</a>
            </div>

            <form method="POST" action="Updatecode.php">
                <input type="hidden" name="product_id" value="<?= $product['P_ID'] ?>">
                <table class="producttab">
                    <tr>
                        <td class="leftside">
                            <div class="slideshow-container">
                                <div class="titleResize">
                                    <h1>Product Details</h1>
                                </div>
                                <div class="imgfix">
                                    <input type="text" name="name" placeholder="Name" class="form-control2" value="<?= $product['P_Name'] ?>">
                                    <input type="text" name="type" placeholder="Type" class="form-control2 " value="<?= $product['P_Type'] ?>">
                                </div>
                                <div class="seperate imgfix">
                                    <input type="number" name="price" placeholder="Price" class="form-control2" value="<?= $product['P_Price'] ?>">
                                    <input type="number" name="cost" placeholder="Cost" class="form-control2" value="<?= $product['P_Cost'] ?>">
                                    <input type="number" name="stock" placeholder="Stock" class="form-control2" value="<?= $product['P_Stock'] ?>">
                                </div>
                                <div class="seperate imgfix">
                                    <input type="text" name="size" placeholder="Size" class="form-control2" value="<?= $product['P_Size'] ?>">
                                    <input type="text" name="weight" placeholder="Weight" class="form-control2" value="<?= $product['P_Weight'] ?>">
                                    <input type="text" name="color" placeholder="Color" class="form-control2" value="<?= $product['P_Color'] ?>">
                                </div>
                                <div class="seperate imgfix">
                                    <textarea name="description" placeholder="Description" class="form-control3"><?= $product['P_Description'] ?></textarea>
                                </div>
                            </div>
                        </td>

                        <td class="rightside">
                            <div class="slideshow-container">
                                <div class="titleResize">
                                    <h1>Product Image</h1>
                                </div>
                                <!-- Display existing product image -->
                                <img src="../Images/Products/<?= $product['P_Image'] ?>.jpg" alt="Product Image" style="width: 200px;">
                                <!-- Input field for selecting new image -->
                                <label for="image" class="file-input-wrapper">
                                    <input type="file" name="image" id="image" accept="image/*">
                                    <span class="file-input-button">Choose New Image</span>
                                </label>
                                <div class="imgfix">
                                    <button type="submit" class="btn">Update Product</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>

            </form>

        </section>
        <div class="blank">&nbsp</div>
        <span class="blank">&nbsp</span>
        <span class="blank">&nbsp</span>
        <span class="blank">&nbsp</span>

        <?php include 'Footer.php'; ?>
    </div>
</body>

</html>