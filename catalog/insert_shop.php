
<?php
include "db.php";
$site = $_POST["site"];
$city = $_POST["city"];
$rating = $_POST["rating"];

$sql = "INSERT INTO shop (site, city, rating) VALUES ('$site', '$city', '$rating')";

if ($conn->query($sql) === TRUE) {
    echo "Product added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>