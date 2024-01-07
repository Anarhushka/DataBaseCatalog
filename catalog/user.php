<!DOCTYPE html>
<html lang="ua">
<?php include "db.php";?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
</head>
<body>
<style> form { display: inline-flex; justify-content: space-between; vertical-align: top; padding-top: 5px; margin-left: 10px;} </style>
<form action="http://localhost/catalog/product.php"><button class="btn">Product</button></form>
<form action="http://localhost/catalog/shop.php"><button>Shop</button></form>
<form action="http://localhost/catalog/order.php"><button>Order</button></form>
<form action="http://localhost/catalog/user.php"><button>User</button></form>
<h2>User List</h2>

<?php
$sql = "SELECT name, phone_number, email, adress FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>name</th><th>phone_number</th><th>email</th><th>adress</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["phone_number"] . "</td><td>". $row["email"] . "</td><td>" . $row["adress"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>

<h2>Add User</h2>
<form action="insert_user.php" method="post">
    Name: <input type="text" name="name" pattern="[A-Za-z ]+" title="Лише літери та пробіл дозволені" required><br>
    Phone number: <input type="tel" name="phone_number" pattern="[0-9]{12}" title="Введіть 12 цифр" required><br>
    Email: <input type="text" name="email" required oninput="this.value = this.value.replace(/\s/g, '')"><br>
    Adress: <input type="text" name="adress" required><br>
    <input type="submit" value="Add User">
</form>

<h2>Delete User</h2>
<form action="delete_user.php" method="post">
    User name: <input type="text" name="name" required><br>
    <input type="submit" value="Delete User">
</form>

<h2>Update User</h2>
<form action="edit_user.php" method="post">
    User name: <input type="text" name="name" pattern="[A-Za-z ]+" title="Лише літери та пробіл дозволені" required><br>
    New Name: <input type="text" name="new_name" pattern="[A-Za-z ]+" title="Лише літери та пробіл дозволені" required><br>
    New Phone number: <input type="tel" name="phone_number" pattern="[0-9]{12}" title="Введіть 12 цифр" required><br>
    New Email: <input type="text" name="email" required oninput="this.value = this.value.replace(/\s/g, '')"><br>
    New Adress: <input type="text" name="adress" required><br>
    <input type="submit" value="Update User">
</form>

</body>
</html>