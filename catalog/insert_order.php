
<?php
include "db.php";
$Data = $_POST["Data"];
$user_id = $_POST["user_id"];
$order_status = $_POST["order_status"];
$postal_index = $_POST["postal_index"];

$sql = "INSERT INTO oorder (Data, user_id, order_status, postal_index) VALUES ('$Data', '$user_id', '$order_status','$postal_index' )";

if ($conn->query($sql) === TRUE) {
    echo "Order added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>