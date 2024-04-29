<?php


session_start();

require_once "Connect.php";

if (isset($_SESSION['user'])) { // Check if the user is an admin
    try {
        // Fetch all orders and associated products
        $proman_sql = "SELECT * FROM Product";
        $proman_stmt = $pdo->query($proman_sql);
        $select_products = $proman_stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    // Redirect unauthorized users to a suitable page
    header("Location: Unauthorized.php");
    exit();
}

$rollnum = 0;

// SELECT SUM(OrderLine.O_Quantity * Product.P_Price) FROM OrderLine INNER JOIN Product ON OrderLine.P_ID = Product.P_ID INNER JOIN OrderList ON OrderLine.O_ID = OrderList.O_ID WHERE OrderList.C_ID = 1;

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

        <section class="flexpage rflex">
            <div class="cat-title2">
                <a href="#" class="Pagetitle">
                    <h2>PRODUCT LIST</h2>
                    <!-- <php var_dump($select_orders) ?>
                    <php var_dump($_SESSION['ID']) ?> -->
                </a>

            </div>
            <div class="cat-title2">
                
                <a class="btn btn-outline-danger" href="NewProduct.php">Add New Products</a>

            </div>
            <!-- <hr class="titline"> -->
            <br>
            <div>

                <div class="producttab2">
                    <!-- <div class="slideshow-container2 "> -->
                    <!-- <div class="  imgfix2"> -->
                    <div class="cart-items-container imgfix2 ">

                        <table class="cart-items" border="0" cellspacing="0">

                            <thead>
                                <tr>

                                    <!-- <th>No.</th> -->
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th colspan="3">Actions</th>

                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($select_products as $item) : ?>

                                    <tr>

                                        <td align="center"><?= ++$productnum; ?></td>
                                        <td class="tableimgfix">
                                            <img src="../Images/Products/<?= $item['P_Image']; ?>.jpg">
                                        </td>
                                        <td align="center"><?= $item['P_Name']; ?></td>
                                        <td align="center"><?= $item['P_Type']; ?></td>
                                        <td align="center"><?= $item['P_Price']; ?> Ks</td>

                                        <td align="center">
                                            <a class="btn btn-outline-danger" name="remove" href="ViewProducts.php?id=<?= $item['P_ID'] ?>">View</a>
                                        </td>
                                        <td align="center">
                                            <a class="btn btn-outline-danger" name="remove" href="UpdateProduct.php?id=<?= $item['P_ID'] ?>">Update</a>
                                        </td>
                                        <td align="center">



                                            <a href="Delete.php?id=<?= $item['P_ID'] ?>" class="btn btn-outline-danger" name="remove">Delete</a>

                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>


                    </div>


                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- </td>

                    </tr> -->

                </div>

                <div class="blank">&nbsp</div>
                <span class="blank">&nbsp</span>
                <span class="blank">&nbsp</span>
                <span class="blank">&nbsp</span>

            </div>

        </section>
        <?php include 'Footer.php'; ?>
    </div>
</body>

</html>