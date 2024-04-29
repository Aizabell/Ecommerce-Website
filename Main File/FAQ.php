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
    <title>Karaweik - FAQ</title>

    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Home.css">
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/BlogMain.css">
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Product.css">

</head>

<body class="textformat colorformat bodyformat">
    <div class="container">
        <?php require_once 'NormalNavBar.php'; ?>

        <section class="productpage rflex">
            <div class="cat-title">
                <h2>FAQ</h2>
            </div>
            <hr class="titline">
            <br>
            <div class="product-box">
                <div class="productwrap">
                    <div class="feature-box">
                        <div class="product">
                            <div class="">
                                <span>&nbsp</span>

                            </div>
                            <div class="catebox">
                                <div class="catetail">
                                    <span>&nbsp</span>
                                    <h1>Are the products 100% Eco-Friendly</h1>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                    <h4>Yes. All the goods in the website are made with natural products and easy to decompose and not harmful to the nature</h4>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="product">
                            <div class="">
                                <span>&nbsp</span>

                            </div>
                            <div class="catebox">
                                <div class="catetail">
                                    <span>&nbsp</span>
                                    <h1>Can I ask for refund?</h1>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                    <h4>The refund period is only available if the customer contact us within 3 days after the purchase had been made.</h4>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="product">
                            <div class="">
                                <span>&nbsp</span>

                            </div>
                            <div class="catebox">
                                <div class="catetail">
                                    <span>&nbsp</span>
                                    <h1>Can I order for custom made products?</h1>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                    <h4>Unfortunately, custome made service are not available at the moment. It is planned to be added in the future.</h4>
                                    <span>&nbsp</span>
                                    <span>&nbsp</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        


        <?php require_once 'Footer.php'; ?>
    </div>

</body>

</html>