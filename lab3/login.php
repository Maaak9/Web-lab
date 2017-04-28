<?php
include('template.php');
if (isset($_POST['username']) and isset($_POST['password'])) {
  $name = $_POST['username'];
  $pwd = $_POST['password'];
  $query = <<<END
  SELECT username, password, id FROM users
  WHERE username = '{$name}'
  AND password = '{$pwd}'
END;
  $result = $conn->prepare($query);
  $result->execute();
  if ($row = $result->fetch(PDO::FETCH_OBJ)) {
       $_SESSION["username"] = $row->username;
    $_SESSION["userId"] = $row->id;
    header("Location:index.php");
  } else {
    echo "Wrong username or password. Try again";
  }
}
$content = <<<END
<form action="login.php" method="post">
<input type="text" name="username" placeholder="username">
<input type="password" name="password" placeholder="password">
<input type="submit" value="Login">
</form>
END;
echo $navigation;
echo $content;
?>
