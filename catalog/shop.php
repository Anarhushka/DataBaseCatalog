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
<h2>Shops List</h2>

<?php
$sql = "SELECT site, city, rating FROM shop";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Site</th><th>City</th><th>Rating</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["site"] . "</td><td>" . $row["city"] . "</td><td>". $row["rating"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
<h2>Add Shop</h2>
<form action="insert_shop.php" method="post">
    Site: <input type="text" name="site" pattern="[^\s]*\.[^\s]*" title="Введіть назву сайту з точкою" required><br>
    City: <input type="text" name="city" pattern="[A-Za-zА-Яа-яЁёІіЇїЄєҐґ]+" title="Тілки букви дозволені" required><br>
    Rating: <input type="text" name="rating" pattern="[0-5](\.\d{1,2})?" title="Тільки числа від 0 до 5" required min="0"><br>
    <input type="submit" value="Add site">
</form>
<h2>Delete Shop</h2>
<form action="delete_shop.php" method="post">
    Site name: <input type="text" name="site" pattern="[^\s]*\.[^\s]*" title="Введіть назву сайту з точкою" required><br>
    <input type="submit" value="Delete site">
</form>
<h2>Update Shop</h2>
<form action="edit_shop.php" method="post">
    Site name: <input type="text" name="site" pattern="[^\s]*\.[^\s]*" title="Введіть назву сайту з точкою" required><br>
    New Name: <input type="text" name="new_site" pattern="[^\s]*\.[^\s]*" title="Введіть назву сайту з точкою"" required><br>
    New City: <input type="text" name="city" pattern="[A-Za-zА-Яа-яЁёІіЇїЄєҐґ]+" title="Тілки букви дозволені" required><br>
    New Rating: <input type="text" name="rating" pattern="[0-5](\.\d{1,2})?" title="Тільки цифри дозволені" required min="0"><br>
    <input type="submit" value="Update shop">
</form>
</body>
</html>