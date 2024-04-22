<?php

require_once "Connect.php";

session_start();



$product_id = $_GET['id'];
$query = "SELECT * FROM Product WHERE P_ID=:id";
$product_stmt = $pdo->prepare($query);
$product_stmt->bindParam(':id', $product_id);
$product_stmt->execute();
$product = $product_stmt->fetch(PDO::FETCH_ASSOC);

if (!isset ($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if product is already in cart
$item_array_id = array_column($_SESSION['cart'], 'product_id');

if (in_array($product_id, $item_array_id)) {
    echo "<script>alert('Product is already in cart')</script>";
} else {
    // Add product to cart
    $count = count($_SESSION['cart']);
    $item_array = array(
        'product_id' => $product_id,
        'item_name' => $product['name'],
        'product_price' => $product['price'],
        'item_quantity' => 1
    );

    $_SESSION['cart'][$count] = $item_array;
}
















// unset($_SESSION['cart']);

// // get values via URL using GET request
// echo "This is test";

// $pro_id = $_GET['pro_id'];
// $pro_name = $_GET['pro_name'];
// $pro_type = $_GET['pro_type'];
// $pro_price = $_GET['pro_price'];
// $pro_stock = $_GET['pro_stock'];
// $pro_image = $_GET['pro_image'];
// print_r($pro_id);
// print_r($pro_name);
// print_r($pro_type);
// print_r($pro_price);
// print_r($pro_stock);
// print_r($pro_image);
// // echo $pro_id, $pro_name, $pro_cat, $pro_price, $pro_stock;

// if (!isset ($_SESSION['cart'])) {
//     $_SESSION['cart'] = [];
// }

// if (isset ($_SESSION['cart'][$pro_id])) {
//     $_SESSION['cart'][$pro_id]['qty']++;
// } else {
//     // SESSION['cart'] stores values from GET request
//     $_SESSION['cart'][$pro_id] = [
//         "pro_id" => $pro_id,
//         "pro_name" => $pro_name,
//         "pro_type" => $pro_type,
//         "pro_price" => $pro_price,
//         "pro_stock" => $pro_stock,
//         "pro_image" => $pro_image,
//         'qty' => 1,
//     ];
// }
// print_r($_SESSION);

// foreach ($_SESSION['cart'] as $i) {
//     print_r($i);
//     echo "<br>";
// }
// unset($_SESSION['cart']);
// include 'NormalNavBar.php';

//header("Location: ViewProducts.php?");
// header("Location: Products.php");
