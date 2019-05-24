<?php
	include ('php/header.php');
	include ('php/login.php');
?>
<h2><a href='inventory.php'>Parcourir nos produits</a></h2>
<h3><a href='inventory.php?category=Velos'>Velos</a> <a href='inventory.php?category=Voitures'>Voitures</a> <a href='inventory.php?category=Telephones'>Telephones</a> <a href='inventory.php?category=Jeux'>Jeux</a> <a href='inventory.php?category=Nourriture'>Nourriture</a></h3>
<div class="prod_ran">
	
<?php
include 'php/menu_articles.php';
?>
</div>
</div>
		<?php
			include('php/footer.php')
		?>


</body>
</html>
