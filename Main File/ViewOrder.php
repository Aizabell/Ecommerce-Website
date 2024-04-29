<?php


session_start();

require_once "Connect.php";



if (isset($_GET['id'])) {
    try {
        // Fetch order details based on the order ID
        $orderId = $_GET['id'];
        $order_sql = "SELECT * FROM `OrderList` WHERE `O_ID` = :orderId AND `C_ID` = :userId";
        $order_stmt = $pdo->prepare($order_sql);
        $order_stmt->bindParam(':orderId', $orderId);
        $order_stmt->bindParam(':userId', $_SESSION['ID']);
        $order_stmt->execute();
        $order = $order_stmt->fetch(PDO::FETCH_ASSOC);

        if (!$order) {
            // If the order doesn't exist or doesn't belong to the user, redirect to a suitable page
            header("Location: Orders.php");
            exit();
        }

        // Fetch products associated with the order including product details
        $products_sql = "SELECT Product.P_ID, Product.P_Name, Product.P_Type, Product.P_Image, Product.P_Price, OrderLine.O_Quantity 
                        FROM OrderLine 
                        INNER JOIN Product ON OrderLine.P_ID = Product.P_ID 
                        WHERE OrderLine.O_ID = :orderId";
        $products_stmt = $pdo->prepare($products_sql);
        $products_stmt->bindParam(':orderId', $orderId);
        $products_stmt->execute();
        $products = $products_stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    // If orderId is not provided in the URL, redirect to a suitable page
    header("Location: Orders.php");
    exit();
}


$productnum = 0;

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
                <a href="Cart.php" class="Pagetitle">
                    <h2>VIEW ORDER</h2>
                    <!-- <php var_dump($select_orders) ?>
                    <php var_dump($_SESSION['ID']) ?> -->
                </a>

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
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                    <th>&nbsp</th>

                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($products as $item) : ?>

                                    <tr>

                                        <td align="center"><?= ++$productnum; ?></td>
                                        <td class="tableimgfix">
                                            <img src="../Images/Products/<?= $item['P_Image']; ?>.jpg">
                                        </td>
                                        <td align="center"><?= $item['P_Name']; ?></td>
                                        <td align="center"><?= $item['O_Quantity']; ?></td>
                                        <td align="center"><?= $item['P_Price']; ?> Ks</td>
                                        <td align="center"><?= $item['P_Price'] * $item['O_Quantity']; ?> Ks</td>
                                        <td align="center">
                                            <a class="btn btn-outline-danger" name="remove" href="ViewProducts.php?id=<?= $item['P_ID'] ?>">View</a>

                                            <!-- <form method="POST">
                                            <input type="hidden" value=<= $product['O_ID'] ?> name="order_id">

                                            <button class="btn btn-outline-danger" name="remove">View</button>
                                        </form> -->
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