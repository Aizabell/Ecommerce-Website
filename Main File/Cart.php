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
    }
}
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Cart.css">
</head>

<body>
    <div class="container">
        <?php include 'NormalNavBar.php'; ?>


        <div class="cart_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="cart_container">
                            <div class="cart_title">Shopping Cart<small> (1 item in your cart) </small></div>
                            <?php foreach ($_SESSION['cart'] as $product) : ?>
                                <div class="cart_items">
                                    <ul class="cart_list">
                                        <li class="cart_item clearfix">
                                            <div class="cart_item_image"><img src=".jpg" alt=""></div>
                                            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                <div class="cart_item_name cart_info_col">
                                                    <div class="cart_item_title">Name</div>
                                                    <div class="cart_item_text">
                                                        <?= $product['pro_name'] ?>
                                                    </div>
                                                </div>
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Category</div>
                                                    <div class="cart_item_text"><span style="background-color:#999999;"></span>
                                                        <?= $product['pro_type'] ?>
                                                    </div>
                                                </div>
                                                <div class="cart_item_quantity cart_info_col">
                                                    <div class="cart_item_title">Quantity</div>
                                                    <div class="cart_item_text">
                                                        <form method="POST">
                                                            <input type="hidden" value=<?= $product['pro_id'] ?> name="pro_id">
                                                            <button class="btn btn-outline-primary" name="increase">+</button>
                                                            <input type="number" min="0" value=<?= $product['qty'] ?> style="width: 50px" readonly>
                                                            <button class="btn btn-outline-primary" name="decrease">-</button>
                                                            <button class="btn btn-outline-danger" name="remove">Remove</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="cart_item_price cart_info_col">
                                                    <div class="cart_item_title">Price</div>
                                                    <div class="cart_item_text">
                                                        <?= $product['pro_price'] ?>
                                                    </div>
                                                </div>
                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Total</div>
                                                    <div class="cart_item_text">
                                                        <?= $product['pro_price'] * $product['qty'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            <?php endforeach ?>
                            <div class="order_total">
                                <div class="order_total_content text-md-right">
                                    <div class="order_total_title">Order Total:</div>
                                    <div class="order_total_amount">
                                        <?= $total_amount ?>
                                    </div>
                                </div>
                            </div>
                            <div class="cart_buttons"> <button type="button" class="button cart_button_clear">Continue
                                    Shopping</button> <button type="button" class="button cart_button_checkout">Add to
                                    Cart</button> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>