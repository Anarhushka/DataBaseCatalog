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
<h2>Order List</h2>

<?php
$sql = "SELECT user_id, id, data, order_status, postal_index FROM oorder";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>user_id</th><th>id</th><th>Data</th><th>Status</th><th>postal_index</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["user_id"] . "</td><td>" . $row["id"] . "</td><td>" . $row["data"] . "</td><td>". $row["order_status"] . "</td><td>". $row["postal_index"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>

<h2>Add Order</h2>
<form action="insert_order.php" method="post">
    Date: <input type="date" name="date" required><br>
    User id: <input type="number" name="user_id" required><br>
    Order status: <select name="order_status" required>
    <option value="in stock">processed</option>
        <option value="out of stock">in delivery</option>
        </select><br>
    Postal index: <input type="number" name="postal_index" required><br>
    <input type="submit" value="Add Order">
</form>

<h2>Delete Order</h2>
<form action="delete_order.php" method="post">
    Order id: <input type="number" name="id" required><br>
    <input type="submit" value="Delete Order">
</form>

<h2>Update Order</h2>
<form action="edit_order.php" method="post">
    Id: <input type="number" name="id" pattern="\d+" title="Тільки цифри дозволені" required><br>
    New Status: <select name="order_status" required>
    <option value="in stock">processed</option>
        <option value="out of stock">in delivery</option>
        </select><br>
    New Postal index: <input type="number" name="postal_index" pattern="\d+" title="Тільки цифри дозволені" required><br>
    New Date: <input type="date" name="date" required><br>
    <input type="submit" value="Update Order">
</form>


</body>
</html>