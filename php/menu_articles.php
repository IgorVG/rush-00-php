<?PHP
include ("connexion.php");
$query = mysqli_query($link, "SELECT * FROM `inventory` ORDER BY RAND() LIMIT 5");
while (($array = mysqli_fetch_assoc($query)) !== NULL)
{
	echo "<section>";
	echo '<img src=';
	echo $array['photo'];
	echo ">";
	echo "<p class='product'>";
	echo $array['name']."</p>";
	echo "<p class='price'>".$array['price']."</p>";
	echo "<a href=inventory.php?category=".$array['category'].">";
	echo "<p>Voir plus de ".$array['category']."</p></a>";
	echo "<form method='post' action='panier.php?id=";
	echo $array['id'];
	echo "'>";
	echo "<input type='submit' class='submit' value='+1'>";
	echo "</form></section>";
}
?>
