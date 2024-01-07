
<?php
include "db.php";
$id = $_POST["id"];

$sql = "DELETE FROM oorder WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Order deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>