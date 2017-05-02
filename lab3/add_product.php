<?php
include_once('template.php');
if (isset($_POST['name'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $created_at = date('Y-m-d H:i:s');
 $query = <<<END
INSERT INTO products(name,price,description, created_at)
 VALUES('{$name}' , '{$price}' , '{$description}' , '{$created_at}')
END;
$result = $conn->prepare($query);
$check = $result->execute();
 echo 'Product added to the database!';
}
$content = <<<END
<h1>Add product</h1>
<form method="post" action="add_product.php">
<input type="text" name="name" placeholder="Productname"><br>
<input type="text" name="price" placeholder="Price"><br>
<textarea name="description" placeholder="Description"></textarea><br>
<input type="submit" value="Add product">
<input type="reset" value="reset">
</form>
END;
echo $navigation;
echo $content;
?>
