<?php


session_start();

require_once "Connect.php";

if (isset($_SESSION['user'])) { // Check if the user is an admin
    try {
        // Fetch all orders and associated products
        $Ohis_sql = "SELECT OrderList.O_ID, OrderList.O_Status, COUNT(OrderLine.O_ID) as order_count, SUM(OrderLine.O_Quantity * Product.P_Price) as order_total,
                            Customer.C_UserName as customer_name
                        FROM OrderList 
                        LEFT JOIN OrderLine ON OrderList.O_ID = OrderLine.O_ID 
                        LEFT JOIN Product ON OrderLine.P_ID = Product.P_ID 
                        LEFT JOIN Customer ON OrderList.C_ID = Customer.C_ID
                        GROUP BY OrderList.O_ID";
        $Ohis_stmt = $pdo->query($Ohis_sql);
        $select_orders = $Ohis_stmt->fetchAll(PDO::FETCH_ASSOC);
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
                    <h2>ORDER LIST</h2>
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
                    <div class="cart-items-container imgfix2">

                        <table class="cart-items" border="0" cellspacing="0">

                            <thead>
                                <tr>
                                    <!-- <th>Image</th> -->
                                    <!-- <th>No.</th> -->
                                    <th>Order No</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Total Items</th>
                                    <th>Total Price</th>
                                    <th colspan="2">Actions</th>

                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($select_orders as $order) : ?>

                                    <tr>
                                        <!-- <td>
                                                <img src="../Images/Products/<= $product['pro_image']; ?>.jpg">
                                            </td> -->
                                        <td align="center"><?= ++$rollnum; ?></td>
                                        <td align="center"><?= $order['customer_name']; ?></td>
                                        <td align="center"><?= $order['O_Status']; ?></td>
                                        <td align="center"><?= $order['order_count']; ?></td>
                                        <td align="center"><?= $order['order_total']; ?> Ks</td>
                                        <td align="center">
                                            <a class="btn btn-outline-danger" name="operate" href="ViewOrder.php?id=<?= $order['O_ID'] ?>">View</a>

                                            <!-- <form method="POST">
                                            <input type="hidden" value=<= $product['O_ID'] ?> name="order_id">

                                            <button class="btn btn-outline-danger" name="remove">View</button>
                                        </form> -->
                                        </td>
                                        <td align="center">
                                            <form method="POST" action="UpdateOrder.php">
                                                <input type="hidden" name="order_id" value="<?= $order['O_ID']; ?>">
                                                <button class="btn btn-outline-danger" type="submit" name="update_status">Confirm</button>
                                            </form>
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