<?php
session_start();
$total_amount = 0;

// print_r($_SESSION['cart']);

foreach ($_SESSION['cart'] as $product) {
    // echo $product['qty'] . "<br>";
    // echo $product['pro_price'] . "<br>";
    $total_amount += ($product['qty'] * $product['pro_price']);
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = $_POST['pro_id'];
    // echo $id;

    if (isset($_POST['increase'])) {
        if ($_SESSION['cart'][$id]['qty'] < 10) {
            $_SESSION['cart'][$id]['qty']++;
        }
    }
    if (isset($_POST['decrease'])) {
        if ($_SESSION['cart'][$id]['qty'] > 1) {
            $_SESSION['cart'][$id]['qty']--;
        }
    }
    if (isset($_POST['remove'])) {
        unset($_SESSION['cart'][$id]);
        $total_amount -= ($product['qty'] * $product['pro_price']);
    }
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

        <section class="flexpage rflex">
            <div class="cat-title2">
                <a href="Cart.php" class="Pagetitle selected">
                    <h2>CART</h2>
                </a>
                <hr class="titlines">
                <a href="Payment.php?total=<?= $total_amount ?>" class="Pagetitle">
                    <h2>PAYMENT</h2>
                </a>
                <hr class="titlines">
                <a href="CheckOut.php" class="Pagetitle">
                    <h2>CHECKOUT</h2>
                </a>
            </div>
            <!-- <hr class="titline"> -->
            <br>
            <div>

                <table class="producttab" cellspacing="0">
                    <tr border-right=" 1px solid #000000;">

                        <td class="imagetab1 leftside" valign="top" border-right=" 1px solid #000000;">
                            <div class="slideshow-container rflex">
                                <div class="  imgfix">
                                    <h3>Cart Information</h3>
                                </div>
                                <div class="  imgfix">
                                    <h3>Total Items:</h3>
                                    <h3><?= $total ?></h3>
                                </div>
                                <div class="  imgfix">
                                    <h3>Total Amount:</h3>
                                    <h3><?= $total_amount ?> Ks</h3>
                                </div>
                                <div class="  imgfixing">
                                    <h3>&nbsp</h3>
                                    <h3><a href="Payment.php?total=<?= $total_amount ?>" class="path-btn">Next</a></h3>

                                </div>


                            </div>
                        </td>
                        <!-- <td class="middle-border"></td> -->
                        <td class="imagetab2 rightside" valign="top">
                            <div class="slideshow-container2 ">
                                <!-- <div class="  imgfix2"> -->
                                <div class="cart-items-container imgfix2">
                                    <?php if (empty($_SESSION['cart'])) : ?>
                                        <div class="  imgfix">
                                            <h3>Your Cart is Empty!</h3>
                                        </div>

                                    <?php else : ?>
                                        <table class="cart-items" border="0" cellspacing="0">

                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php foreach ($_SESSION['cart'] as $product) : ?>

                                                    <tr>
                                                        <td>
                                                            <img src="../Images/Products/<?= $product['pro_image']; ?>.jpg">
                                                        </td>
                                                        <td><?= $product['pro_name']; ?></td>
                                                        <td><?= $product['pro_price']; ?> Ks</td>
                                                        <td>
                                                            <form method="POST">
                                                                <input type="hidden" value=<?= $product['pro_id'] ?> name="pro_id">
                                                                <button class="btn btn-outline-primary" name="increase">+</button>
                                                                <input type="number" min="0" value=<?= $product['qty'] ?> style="width: 50px" readonly>
                                                                <button class="btn btn-outline-primary" name="decrease">-</button>

                                                            </form>

                                                        </td>
                                                        <td><?= $product['pro_price'] * $product['qty'] ?></td>
                                                        <td>
                                                            <form method="POST">
                                                                <input type="hidden" value=<?= $product['pro_id'] ?> name="pro_id">

                                                                <button class="btn btn-outline-danger" name="remove">Remove</button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                <?php endforeach; ?>

                                            </tbody>

                                        </table>
                                    <?php endif; ?>

                                </div>


                                <!-- </div> -->
                            </div>
                        </td>

                    </tr>

                </table>

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



<