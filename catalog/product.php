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
<h2>Products List</h2>

<?php
$sql = "SELECT name, product_price, product_status, shop_id FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Name</th><th>Price</th><th>Status</th><th>Shop_id</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["product_price"] . "</td><td>". $row["product_status"] . "</td><td>". $row["shop_id"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
<h2>Add Product</h2>
<form action="insert_product.php" method="post">
    Name: <input type="text" name="name" required><br>
    Price: <input type="number" name="product_price" pattern="\d+" title="Тільки цифри дозволені" required min="1"><br>
    Status:     <select name="product_status" required>
        <option value="in stock">In Stock</option>
        <option value="out of stock">Out of Stock</option>
    </select><br>
    Shop id: <input type="number" name="shop_id" pattern="\d+" title="Тільки цифри дозволені" required><br>
    <input type="submit" value="Add Product">
</form>
<h2>Delete Product</h2>
<form action="delete_product.php" method="post">
    Product name: <input type="text" name="name" required><br>
    <input type="submit" value="Delete Product">
</form>
<h2>Update Product</h2>
<form action="edit_product.php" method="post">
    Product name: <input type="text" name="name" required><br>
    New Name: <input type="text" name="new_name" required><br>
    New Price: <input type="number" name="product_price" pattern="\d+" title="Тільки цифри дозволені" required min="1"><br>
    New Status:     <select name="product_status" required>
        <option value="in stock">In Stock</option>
        <option value="out of stock">Out of Stock</option>
    </select><br>
    New Shop_id: <input type="number" name="shop_id" pattern="\d+" title="Тільки цифри дозволені" required><br>
    <input type="submit" value="Update Product">
</form>

</body>
</html>