<?php
session_start();

require_once "Connect.php";



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
                <a href="NewProduct.php" class="Pagetitle selected">
                    <h2>NEW PRODUCT </h2>
                </a>
            </div>
            <div class="cat-title2">
                <a href="AProduct.php" class="Pagetitle btn">Back</a>
            </div>

            <form method="POST" action="CreateNewProduct.php" enctype="multipart/form-data">>

                <table class="producttab">

                    <tr>
                        <td class="leftside">

                            <div class="slideshow-container">

                                <div class="titleResize">
                                    <h1>Product Details</h1>
                                </div>
                                <div class="imgfix">
                                    <input type="text" name="name" placeholder="Name" class="form-control2">
                                    <input type="text" name="type" placeholder="Type" class="form-control2 ">
                                </div>
                                <div class="seperate imgfix">
                                    <input type="number" name="price" placeholder="Price" class="form-control2">
                                    <input type="number" name="cost" placeholder="Cost" class="form-control2">
                                    <input type="number" name="stock" placeholder="Stock" class="form-control2">
                                </div>
                                <div class="seperate imgfix">
                                    <input type="text" name="size" placeholder="Size" class="form-control2">
                                    <input type="text" name="weight" placeholder="Weight" class="form-control2">
                                    <input type="text" name="color" placeholder="Color" class="form-control2">
                                </div>
                                <div class="seperate imgfix">
                                    <textarea name="description" placeholder="Description" class="form-control3"></textarea>
                                </div>

                            </div>

                        </td>

                        <td class="rightside">

                            <div class="slideshow-container">

                                <div class="titleResize">
                                    <h1>Product Image</h1>
                                </div>

                                <label for="image" class="file-input-wrapper">
                                    <input type="file" name="image" id="image" accept="image/*">
                                    <span class="file-input-button">Choose Image</span>
                                </label>

                                <div class="imgfix">
                                    <button type="submit" class="btn">Create Product</button>
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



        </section>
        <?php include 'Footer.php'; ?>
    </div>
</body>

</html>