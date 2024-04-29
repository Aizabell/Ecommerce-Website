<?php
session_start();

$total_amount = $_GET['total'];

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
                <a href="Cart.php" class="Pagetitle ">
                    <h2>CART</h2>
                </a>
                <hr class="titlines">
                <a href="Payment.php?total=<?= $total_amount ?>" class="Pagetitle selected">
                    <h2>PAYMENT</h2>
                </a>
                <hr class="titlines">
                <a href="CheckOut.php?total=<?= $total_amount ?>" class="Pagetitle">
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
                                    <h3><a href="Cart.php" class="path-btn">Prev</a></h3>
                                    <h3><a href="CheckOut.php?total=<?= $total_amount ?>" class="path-btn">Next</a></h3>
                                </div>


                            </div>
                        </td>
                        <!-- <td class="middle-border"></td> -->
                        <td class="imagetab2 rightside" valign="top">
                            <div class="slideshow-container3 ">
                                <form action="UpdateCustomer.php" method="POST">
                                    <div class="  imgfix">
                                        <h3>Payment Information</h3>
                                    </div>
                                    <div class="seperate  imgfix">
                                        <h3>Visa Card Number:</h3>
                                        <input type="text" name="card" placeholder="Card Number" class="form-control">
                                    </div>
                                    <div class="seperate  imgfix">
                                        <h3>Security Number</h3>
                                        <input type="text" name="security" placeholder="Security Number" class="form-control">
                                    </div>
                                    <div class="  imgfixing">
                                        <h3>&nbsp</h3>
                                        <button type="submit" class="path-btn">Confirm</button>
                                    </div>
                                </form>

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