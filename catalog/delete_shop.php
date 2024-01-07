
<?php
include "db.php";
$site = $_POST["site"];

$sql = "DELETE FROM shop WHERE site = '$site'";

if ($conn->query($sql) === TRUE) {
    echo "Site deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>