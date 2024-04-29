<?php

require_once "Connect.php";

session_start();


$pro_id = $_GET['pro_id'];
$pro_name = $_GET['pro_name'];
$pro_type = $_GET['pro_type'];
$pro_price = $_GET['pro_price'];
$pro_stock = $_GET['pro_stock'];
$pro_image = $_GET['pro_image'];


if (!isset ($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset ($_SESSION['cart'][$pro_id])) {
    $_SESSION['cart'][$pro_id]['qty']++;
} else {
    // SESSION['cart'] stores values from GET request
    $_SESSION['cart'][$pro_id] = [
        "pro_id" => $pro_id,
        "pro_name" => $pro_name,
        "pro_type" => $pro_type,
        "pro_price" => $pro_price,
        "pro_stock" => $pro_stock,
        "pro_image" => $pro_image,
        'qty' => 1,
    ];
}
print_r($_SESSION['cart']);
echo "<br>";
print_r($_SESSION['cart'][$pro_image]);

// foreach ($_SESSION['cart'] as $i) {
//     print_r($i);
//     echo "<br>";
// }
// unset($_SESSION['cart']);

header("Location: ViewProducts.php?id=$pro_id");

?>













