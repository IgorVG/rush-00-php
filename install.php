<?php
include('connexion.php');
if (isset($_POST['submit']))
{
$sql = file_get_contents("db.sql");
$sql_array = explode(";", $sql);
foreach ($sql_array as $val) 
	mysqli_query($link, $val);
echo "SUCCESS";
}
?>
<html>
<head>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
<form action="install.php" method="post">
	<input type="submit" class="submit" name="submit" id="" value="Installer" />
</form>
<form action="index.php" method="post">
	<input type="submit" class="submit" name="home" id="" value="Accueil">
</form>
</body>
</html>