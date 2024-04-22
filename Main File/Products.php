<?php

require_once 'Connect.php';

$sql = "SELECT * FROM Product";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Karaweik - Products</title>

    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Home.css">

    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Product.css">
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/JsCss.css">
    <!-- <link rel="stylesheet" type="text/css" href="../CSS_Main_File/lightslider.css"> -->


</head>

<body class="textformat colorformat bodyformat">
    <div class="container">
        <?php require_once 'NormalNavBar.php'; ?>

        <section class="productpage rflex">
            <div class="cat-title">
                <h2>Product</h2>
            </div>
            <hr class="titline">
            <br>
            <div class="condition-box">
                <div class="category-container">

                    <select id="categorySelect" name="category">
                        <option value="">All categories</option>
                        <option value="Lacquerware">Lacquerware</option>
                        <option value="Bamboo">Bamboo Crafts</option>
                        <option value="Jewelery">Jewelery</option>

                    </select>
                    <button id="filterButton" type="button">Filter</button>

                </div>
                <div class="price-range-container">

                    <input type="number" placeholder="Min price" name="min_price" id="minPriceInput">
                    <input type="number" placeholder="Max price" name="max_price" id="maxPriceInput">
                    <button id="priceFilterButton" type="button">Filter by Price</button>

                </div>
                <div class="search-container">

                    <input type="text" id="searchInput" placeholder="Search products" name="search">
                    <button id="searchButton" type="button">Search</button>

                </div>
            </div>

            <div class="product-box">
                <div class="productwrap">
                    <?php foreach ($products as $product) : ?>

                        <div class="feature-box" data-category="<?= $product['P_Type'] ?>" data-price="<?= $product['P_Price'] ?>">
                            <div class="product">
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
            </div>

        </section>




        <?php require_once 'Footer.php'; ?>
    </div>

    <script>
        // Function to filter products based on search input and category selection
        function filterProducts() {
            const searchInput = document.getElementById('searchInput').value.trim().toLowerCase();
            const categorySelect = document.getElementById('categorySelect').value.toLowerCase();
            const products = document.querySelectorAll('.feature-box');

            products.forEach(product => {
                const productName = product.querySelector('.catetail a').textContent.toLowerCase();
                const productCategory = product.getAttribute('data-category').toLowerCase();
                const matchSearchTerm = productName.includes(searchInput);
                const matchCategory = categorySelect === '' || productCategory === categorySelect;

                if (matchSearchTerm && matchCategory) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        }

        // Event listener for the filter button
        document.getElementById('filterButton').addEventListener('click', filterProducts);

        // Event listener for the search button
        document.getElementById('searchButton').addEventListener('click', filterProducts);

        // Event listener for the price filter button (assuming you want to implement this functionality)
        document.getElementById('priceFilterButton').addEventListener('click', function() {
            const minPrice = parseFloat(document.getElementById('minPriceInput').value) || 0;
            const maxPrice = parseFloat(document.getElementById('maxPriceInput').value) || Infinity;
            const products = document.querySelectorAll('.feature-box');

            products.forEach(product => {
                const productPrice = parseFloat(product.getAttribute('data-price'));
                const matchPrice = productPrice >= minPrice && productPrice <= maxPrice;

                if (matchPrice) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        });
    </script>

</body>

</html>