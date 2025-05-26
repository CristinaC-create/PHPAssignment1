<?php
require_once('database.php');

// Get data from form
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($product_id == null || $category_id == null || $code == null || $name == null || $price == null) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
    exit();
}

// Update product in database
$query = 'UPDATE products
          SET categoryID = :category_id,
              productCode = :code,
              productName = :name,
              listPrice = :price
          WHERE productID = :product_id';
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':code', $code);
$statement->bindValue(':name', $name);
$statement->bindValue(':price', $price);
$statement->bindValue(':product_id', $product_id);
$statement->execute();
$statement->closeCursor();

// Redirect back to product list
header("Location: index.php?category_id=$category_id");
exit();
?>