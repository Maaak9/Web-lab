<?php
include('template.php');
if (isset($_POST['username']) and isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $username = $_POST['username'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
$query = <<<END
INSERT INTO users(username,password,email,fname,lname) VALUES('{$username}' , '{$password}' , '{$email}' , '{$fname}' , '{$lname}')
END;
$result = $conn->prepare($query);
$check = $result->execute();
if ($check !== TRUE) {
die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);
header('Location:index.php');
}
}
$content = <<<END
<form method="post" action="register.php">
<input type = "text" name="username" placeholder="username" ><br>
<input type="password" name="password" placeholder="password"><br>
<input type="text" name="email" placeholder="email"><br>
<input type="text" name="fname" placeholder="first name"><br>
<input type="text" name="lname" placeholder="last name"><br>
<input type="submit" value="Register">
<input type="Reset" value="reset">
</form>
END;
echo $navigation;
echo $content;
?>
