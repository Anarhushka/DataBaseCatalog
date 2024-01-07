<?php
include "db.php";
$site = $_POST["site"];
$new_site = $_POST["new_site"];
$city = $_POST["city"];
$rating = $_POST["rating"];

$sql = "UPDATE shop SET site = '$new_site', city = '$city', rating = '$rating' WHERE site = '$site' ";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Shop updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>