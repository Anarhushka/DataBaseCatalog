
<?php
include "db.php";
$name = $_POST["name"];

$sql = "DELETE FROM product WHERE name = '$name'";

if ($conn->query($sql) === TRUE) {
    echo "Product deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>