
<?php
include "db.php";
$id = $_POST["id"];
$order_status = $_POST["order_status"];
$postal_index = $_POST["postal_index"];
$data = $_POST["data"];

$sql = "UPDATE oorder SET order_status = '$order_status', postal_index = '$postal_index', data = '$data' WHERE id = '$id' ";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Order updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>