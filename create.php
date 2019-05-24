<?php
include ('php/header.php');
include "php/create.php";
include "php/login.php";

?>

<div class="form">
<form id="create_account" method="post" action="create.php">
	<fieldset>
		<h3>Créer un compte</h3>
<?php
if(isset($err))
{
	if ($err === TRUE)
		echo "<span class='success'>Votre compte a été créé !</span>";
	else
		echo "<span class='error'> $err </span>";

}
?>
		<div class="label">
		<label for="email">Adresse mail : </label><input id="email" type="email" name="mail" /> <br>
		<label for="passwd">Mot de passe : </label><input id="passwd" type="password" name="passwd" /> <br>
		<label for="fname">Prénom : </label><input id="fname" type="text" name="fname" /> <br>
		<label for="lname">Nom : </label><input id="lname" type="text" name="lname" /> <br>
		<input type="submit" class="submit" value="Créer un compte" name="register">
		</div>
	</fieldset>
</form>
</div>

<div class="form">
<form id="create_account" method="post" action="create.php">
	<fieldset>
		<h3>Se connecter</h3>
<?php
if(isset($log))
	echo "<span class='error'>$log</span>";
?>
		<div class="label">
		<label for="email">Adresse mail : </label><input id="email" type="email" name="mail" /> <br>
		<label for="passwd">Mot de passe : </label><input id="passwd" type="password" name="passwd" /> <br>
		<input type="submit" class="submit" name="log" value="Se connecter">
		</div>
	</fieldset>
</form>
</div>
