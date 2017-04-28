<link rel="stylesheet" property="stylesheet" type="text/css"
href="css/stylesheet.css">

<?php
session_name('Website');
session_start();
$dbuser = 'foelhohp';
$dbpass = 'O6Ndsjm-4-OuapajynHtO8wzcqZ-poM7';
$host = 'qdjjtnkv.db.elephantsql.com';
$dbname = 'foelhohp';
try {
 $conn = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
}
catch (PDOException $e) {
 echo "Error : " . $e->getMessage() . "<br/>";
 die();
}


$navigation = <<<END
<nav>
 <a href="index.php">Home</a>
 <a href="about.php">About</a>
 <a href="products.php">Products </a>
END;

if (isset($_SESSION['userId']))
{
$navigation .= <<<END
<a href="logout.php">Logout</a>
Logged in as {$_SESSION['username']}
<a href="add_product.php">Add product</a>
END;
}
else{
$navigation .= <<<END
<a href="register.php">Register</a>
<a href="login.php">Login</a>
END;
}
$navigation .= '</nav>';
?>
