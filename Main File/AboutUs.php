<?php

require_once 'Connect.php';


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Karaweik - Blogs</title>

    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Home.css">
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/AboutUs.css">

</head>

<body class="textformat colorformat bodyformat">
    <div class="container">
        <?php require_once 'NormalNavBar.php'; ?>

        <section class="sectpage about-bg">
            <div class="cat-title">
                <h2>&nbsp</h2>
            </div>
            <div>

                <table class="producttab">
                    <tr>
                        <td class="imagetab" valign="middle">
                            <div class="slideshow-container welslide">
                                <div class="mySlides fade imgfix2">

                                    <img src="../Images/LogoY.png">

                                </div>
                            </div>
                        </td>
                        <td rowspan="3" valign="top" class="aboutus-text">

                            <div class="itemtitle">
                                <h2>About Us</h2>

                            </div>


                            <hr>

                            <table class="detailtab" border="0" cellspacing="0">
                                <tr>
                                    <td class="detailtit"><b>Category:</b></td>
                                    <td class="detailfo">Bruh</td>
                                    <td class="detailtit"><b>Color:</b></td>
                                    <td class="detailfo">Bruh</td>
                                    <td class="detailtit"><b>Size:</b></td>
                                    <td class="detailfo"><?= $product['P_Size'] ?></td>
                                    <td class="detailtit"><b>Weight:</b></td>
                                    <td class="detailfo"><?= $product['P_Weight'] ?></td>
                                </tr>

                            </table>
                            <!-- <hr> -->
                            <div class="Descript">
                                <h2>Description</h2>
                                <p><?= $product['P_Description'] ?></p>
                                <!-- <ul>

                                    <li>
                                    
                                    </li>


                                </ul> -->
                            </div>
                            <br>
                            <table class="pricegroup" cellspacing="0">
                                <tr>
                                    <td class="price">
                                        Price
                                    </td>
                                    <td class="tag">
                                        &nbsp&nbsp <?= $product['P_Price'] ?> Ks
                                    </td>
                            </table>
                            <form method="POST" action="AddToCart.php?id=<?= $product['P_ID'] ?>">
                                <button type="submit" name="add_to_cart" class="buybtn">Add To Cart</button>
                                <button type="submit" name="fav" class="buybtn">Favorite</button>
                            </form>

                        </td>
                    </tr>


                </table>

                <div class="blank">&nbsp</div>
                <span class="blank">&nbsp</span>
                <span class="blank">&nbsp</span>
                <span class="blank">&nbsp</span>

            </div>

        </section>




        <?php require_once 'Footer.php'; ?>
    </div>

</body>

</html>