<?php
function ifsessionExists(){
// check if session exists?
  if(isset($_SESSION['userId'])){
    return true;
  }else{
    return false;
  }
 }
require_once('template.php');
$content = '<h1>Products</h1>';
$query = <<<END
SELECT * FROM products
ORDER BY created_at DESC
END;
$result = $conn->prepare($query);
$result->execute();
while ($row = $result->fetch(PDO::FETCH_OBJ)) {
 $content .= <<<END
{$row->name}|
 {$row->price}<br>
 <a href="product_details.php?id={$row->id}">Description</a>|
END;
 if(ifsessionExists()){
 $content .= <<<END
 <a href="delete_product.php?id={$row->id}" onclick="return confirm('Are you sure?')">
 Remove product</a>|
 <a href="edit_product.php?id={$row->id}">Edit product</a><br>
 <hr>
END;
 }
}

echo $navigation;
echo $content;
?>
