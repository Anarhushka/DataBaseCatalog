
<?php
include "db.php";
$name = $_POST["name"];
$new_name = $_POST["new_name"];
$phone_number = $_POST["phone_number"];
$email = $_POST["email"];
$adress = $_POST["adress"];

$sql = "UPDATE user SET name = '$new_name', phone_number = '$phone_number', email = '$email', adress = '$adress' WHERE name = '$name' ";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "User updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>