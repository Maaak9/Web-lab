<?php
include_once('template.php');
$content = 'Edit Product';
if (isset($_GET['id'])) {
 if (isset($_POST['name'])) {
 $query = <<<END
UPDATE products
 SET name = '{$_POST['name']}',
 price = '{$_POST['price']}',
 description = '{$_POST['description']}'
 WHERE id = '{$_GET['id']}'
END;
 $result = $conn->prepare($query);
 $result->execute();
 }
 $query = <<<END
SELECT * FROM products
 WHERE id = '{$_GET['id']}'
END;
 $result = $conn->prepare($query);
 $result->execute();
 if ($row = $result->fetch(PDO::FETCH_OBJ)) {
 $content = <<<END
<form method="post" action="edit_product.php?id={$row->id}">
 <input type="text" name="name" value="{$row->name}"><br>
 <input type="text" name="price" value="{$row->price}"><br>
 <textarea name="description">{$row->description}</textarea><br>
 <input type="submit" value="save">
 </form>
END;
 }
}
echo $navigation;
echo $content;
?>
