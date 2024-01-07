
<?php
include "db.php";
$name = $_POST["name"];
$product_price = $_POST["product_price"];
$product_status = $_POST["product_status"];
$shop_id = $_POST["shop_id"];

$sql = "INSERT INTO product (name, product_price, product_status, shop_id) VALUES ('$name', '$product_price', '$product_status','$shop_id' )";

if ($conn->query($sql) === TRUE) {
    echo "Product added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>