
<?php
include "db.php";
$name = $_POST["name"];

$sql = "DELETE FROM user WHERE name = '$name'";

if ($conn->query($sql) === TRUE) {
    echo "User deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>