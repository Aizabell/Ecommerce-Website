<?php

require_once 'Connect.php';


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Karaweik - Community</title>

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
                        <td  valign="middle" class="aboutus-text">

                            <div class="itemtitle">
                                <h2>Community</h2>

                            </div>


                            <hr>

                            <table class="detailtab" border="0" cellspacing="0">
                                <tr>
                                    <td class="detailtit"><b>&nbsp</b></td>
                                    <td class="detailfo">&nbsp</td>
                                    <td class="detailtit"><b>&nbsp</b></td>
                                    <td class="detailfo">&nbsp</td>
                                    
                                  
                                </tr>

                            </table>
                            <!-- <hr> -->
                            <div class="Descript">
                                <h2>Our humble community begins by approaching local craftman and grouping them together to make high quality goods.</h2>
                                <!-- <ul>

                                    <li>
                                    
                                    </li>


                                </ul> -->
                            </div>
                            <br>
                            <!-- <table class="pricegroup" cellspacing="0">
                                <tr>
                                    <td class="price">
                                        Price
                                    </td>
                                    <td class="tag">
                                        &nbsp&nbsp <?= $product['P_Price'] ?> Ks
                                    </td>
                            </table> -->
                            <!-- <form method="POST" action="AddToCart.php?id=<?= $product['P_ID'] ?>">
                                <button type="submit" name="add_to_cart" class="buybtn">Add To Cart</button>
                                <button type="submit" name="fav" class="buybtn">Favorite</button>
                            </form> -->

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