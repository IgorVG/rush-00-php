<?PHP
include 'manage_database.php';
if (isset($_POST['submit']))
{
if ($_POST['submit'] && $_POST['login'] && $_POST['oldpw'] && $_POST['newpw'])
{
	$link = open_conn('root');
	if (check_passwd($link, $_POST['login'], hash("whirlpool", $_POST['oldpw'])))
		update_passwd($link, $_POST['login'], hash("whirlpool", $_POST['newpw']));
	echo "password updated successfuly.";
	mysqli_close($link);
}
}
?>
<html>
<head>
	<title>Modifier mon mot de passe</title>
    <meta charset="utf-8" />
	<link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Modifier mon mot de passe</h2>
	<fieldset>
	<div class="form">
	<form method="POST" action ="update_password.php">
    Adresse mail : <input type="text" name="login"><br />
    Ancien mot de passe : <input type="text" name="oldpw"><br />
    Nouveau mot de passe : <input type="text" name="newpw"><br />
	<input type="submit" class="modify" name="submit" value="Modifier"><br />
    </form>
	</div>
</fieldset>
<a href='index.php'><h3>Retour à l'accueil</h3></a>
</body>
</html>
