<?php
include "db.php";
$name = $_POST["name"];
$new_name = $_POST["new_name"];
$product_price = $_POST["product_price"];
$product_status = $_POST["product_status"];
$shop_id = $_POST["shop_id"];

$sql = "UPDATE product SET name = '$new_name', product_price = '$product_price', product_status = '$product_status', shop_id = '$shop_id' WHERE name = '$name' ";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Product updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>