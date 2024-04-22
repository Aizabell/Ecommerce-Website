<?php

require_once 'Connect.php';

// $sql = "SELECT * FROM products";
// $stmt = $pdo->query($sql);
// $products = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Karaweik - Blogs</title>

    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Home.css">
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/BlogMain.css">
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Product.css">

</head>

<body class="textformat colorformat bodyformat">
    <div class="container">
        <?php require_once 'NormalNavBar.php'; ?>

        <section class="productpage rflex">
            <div class="cat-title">
                <h2>Blogs</h2>
            </div>
            <hr class="titline">
            <br>
            <div class="product-box">
                <div class="productwrap">
                    <div class="feature-box">
                        <div class="product">
                            <div class="prodimg">
                                <a href="ColumbiaHood.html" class="overlayerduct">
                                    <img src="../Image/Columbia Hoodie.jpg" alt="1">
                                </a>

                            </div>
                            <div class="catebox">
                                <div class="catetail">
                                    <span>&nbsp</span>
                                    <h1>Columbia Hoodie</h1>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                </div>
                                <a href="ColumbiaHood.html" class="seemore-btn">See Article</a>
                            </div>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="product">
                            <div class="prodimg">
                                <a href="ColumbiaHood.html" class="overlayerduct">
                                    <img src="../Image/Columbia Hoodie.jpg" alt="1">
                                </a>

                            </div>
                            <div class="catebox">
                                <div class="catetail">
                                    <span>&nbsp</span>
                                    <h1>Columbia Hoodie</h1>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                </div>
                                <a href="ColumbiaHood.html" class="seemore-btn">See Article</a>
                            </div>
                        </div>
                    </div><div class="feature-box">
                        <div class="product">
                            <div class="prodimg">
                                <a href="ColumbiaHood.html" class="overlayerduct">
                                    <img src="../Image/Columbia Hoodie.jpg" alt="1">
                                </a>

                            </div>
                            <div class="catebox">
                                <div class="catetail">
                                    <span>&nbsp</span>
                                    <h1>Columbia Hoodie</h1>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                </div>
                                <a href="ColumbiaHood.html" class="seemore-btn">See Article</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="minipage">

        </section>


        <?php require_once 'Footer.php'; ?>
    </div>

</body>

</html>