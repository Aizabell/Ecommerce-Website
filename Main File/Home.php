<?php

require_once 'Connect.php';

// require_once 'Footer.php';

$sql = "SELECT * FROM Product ORDER BY RAND() LIMIT 5";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Karaweik - Home</title>

    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Home.css">
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/JsCss.css">
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/lightslider.css">


</head>

<body class="textformat colorformat bodyformat">
    <div class="container">
        <?php require_once 'NormalNavBar.php'; ?>
        <section class="sectpage welcome">
            <div class="welcome-text">
                <h1><b>Welcome to Karaweik</b></h1>
                <h2>Online Shopping Made Easy</h2>
                <h2> <?php echo $_SESSION['user'] ?></h2>
            </div>

        </section>
        <section class="sectpage rflex">
            <div class="cat-title">
                <h2>Featured</h2>
            </div>
            <hr class="titline">
            <br>

            <div class="feature-sect">
                <?php foreach ($products as $product) : ?>
                    <div class="feature-box">
                        <div class="product2">
                            <div class="prodimg">
                                <img src="../Images/Products/<?= $product['P_Image'] ?>.jpg" alt="product.jpg">
                                <div class="overlayduct">
                                    <a href="ViewProducts.php?id=<?= $product['P_ID'] ?>" class="seemore-btn">See more</a>
                                </div>
                            </div>
                            <div class="catebox">
                                <div class="catetail">
                                    <a href="ViewProducts.php"><?= $product['P_Name'] ?></a>

                                </div>
                                <div class="catetail">
                                    <a href="ViewProducts.php"><?= $product['P_Price'] ?></a>

                                </div>

                            </div>
                        </div>
                    </div>

                <?php endforeach ?>

            </div>

        </section>

        <section class="minipage">

        </section>

        <section class="sectpage rflex">
            <div class="cat-title">
                <h2>Category</h2>
            </div>
            <hr class="titline">
            <br>
            <div class="feature-sect">
                <div class="feature-box">
                    <div class="product">
                        <div class="prodimg">
                            <img src="../Image/HandBagDisplay.jpg" alt="1">
                            <div class="overlayduct">
                                <a href="Handbag.html" class="seemore-btn">See more</a>
                            </div>
                        </div>
                        <div class="catebox">
                            <div class="catetail">
                                <a href="Handbag.html">Hand Bags</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="feature-box">
                    <div class="product">
                        <div class="prodimg">
                            <img src="../Image/HandBagDisplay.jpg" alt="1">
                            <div class="overlayduct">
                                <a href="Handbag.html" class="seemore-btn">See more</a>
                            </div>
                        </div>
                        <div class="catebox">
                            <div class="catetail">
                                <a href="Handbag.html">Hand Bags</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="feature-box">
                    <div class="product">
                        <div class="prodimg">
                            <img src="../Image/HandBagDisplay.jpg" alt="1">
                            <div class="overlayduct">
                                <a href="Handbag.html" class="seemore-btn">See more</a>
                            </div>
                        </div>
                        <div class="catebox">
                            <div class="catetail">
                                <a href="Handbag.html">Hand Bags</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
        <?php require_once 'Footer.php'; ?>
    </div>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" activedot", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " activedot";
        }
    </script>

</body>

</html>