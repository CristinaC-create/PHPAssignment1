<?php
require_once('database.php');

// Get product ID
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
if ($product_id == null) {
    header("Location: index.php");
    exit();
}

// Get product from database
$query = 'SELECT * FROM products WHERE productID = :product_id';
$statement = $db->prepare($query);
$statement->bindValue(':product_id', $product_id);
$statement->execute();
$product = $statement->fetch();
$statement->closeCursor();

if (!$product) {
    echo "Product not found.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <main>
        <h1>Edit Product</h1>

        <form action="update_product.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">

            <label>Category ID:</label>
            <input type="text" name="category_id" value="<?php echo $product['categoryID']; ?>">
            <br>

            <label>Code:</label>
            <input type="text" name="code" value="<?php echo $product['productCode']; ?>">
            <br>

            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $product['productName']; ?>">
            <br>

            <label>Price:</label>
            <input type="text" name="price" value="<?php echo $product['listPrice']; ?>">
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Update Product">
            <br>
        </form>

        <p><a href="index.php">Back to Product List</a></p>
    </main>
</body>
</html>