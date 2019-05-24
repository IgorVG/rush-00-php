<?PHP
include ("connexion.php");
if ($_GET['category']=="Velos")
	$query = mysqli_query($link, "SELECT * FROM `inventory` WHERE category='Velos'OR category2='Velos'");
else if ($_GET['category']=="Voitures")
	$query = mysqli_query($link, "SELECT * FROM `inventory` WHERE category='Voitures' OR category2='Voitures'");
else if ($_GET['category']=="Telephones")
	$query = mysqli_query($link, "SELECT * FROM `inventory` WHERE category='Telephones'OR category2='Telephones'");
else if ($_GET['category']=="Jeux")
	$query = mysqli_query($link, "SELECT * FROM `inventory` WHERE category='Jeux'OR category2='Jeux'");
else if ($_GET['category']=="Nourriture")
	$query = mysqli_query($link, "SELECT * FROM `inventory` WHERE category='Nourriture'OR category2='Nourriture'");
else
	$query = mysqli_query($link, "SELECT * FROM `inventory` ORDER BY RAND()");

while (($array = mysqli_fetch_assoc($query)) !== NULL)
{
	echo "<section>";
	echo '<img src=';
	echo $array['photo'];
	echo ">";
	echo "<p class='product'>";
	echo $array['name']."</p>";
	echo "<p class='price'>".$array['price']."</p>";
	echo "<form method='post' action='panier.php'>";
	echo "<input type='submit' class='submit' value='+1'>";
	echo "</form></section>";
}
?>