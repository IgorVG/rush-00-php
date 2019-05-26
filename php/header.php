<?php
session_start();
include ('connexion.php');
?>
<html>
<head>
	<link rel="stylesheet" href="style.css" />
	<meta charset="UTF-8">
	<title>Online shop</title>
</head>
<body>
	<div class="wrapper">
	<header class="container col-lg-12">
		<div class="account">
			<ul>
			<li><a href="index.php">Accueil<br></a></li>
<?php
if(isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != "")
{
	echo "<li><a href=account.php?mail=";
	echo $_SESSION['loggued_on_user'];
	echo "<li><a href='logout.php'>Log out<br></a></li>";
	echo "<li><a href='update_password.php'>Modifier mon mot de passe<br></a></li>";
}
else
{
?>
				<li><a href="create.php">Créer un compte<br></a></li>
				<li><a href="create.php">Se connecter<br></a></li>

<?php
}
?>
			<li><a href="panier-checkout.php">Panier <br>No items</a></li>
			</ul>
		</div>
		<h1>ONLINE SHOP</h1>
		<a href="index.php">
			<img src="./img/logo.png" alt="Home" class="logo"/>
		</a>
	</div>
	</header>
