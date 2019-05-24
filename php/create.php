<?PHP
include ('connexion.php');
if (isset($_POST['register']))
{
	function check_errors()
	{
		include ('connexion.php');

		if (strlen($_POST['passwd']) < 6)
			return ("Erreur : votre mot de passe doit contenir au moins six caractères.");
		if (!preg_match("/^.+@.+\..+$/", $_POST['mail']))
			return ("Erreur : l'adresse mail n'est pas valide.");
		if (strlen($_POST['fname']) == 0 || strlen($_POST['lname']) == 0)
			return "Tous les champs sont obligatoires.";
		$query = mysqli_query($link, "SELECT * FROM `customers`");
		while (($array = mysqli_fetch_assoc($query)) !== NULL)
		{
			if ($array['email'] === $_POST['mail'])
				return ("Ce compte existe déjà");
		}
		return (TRUE);
	}

	if (check_errors() === TRUE)
	{
		$stmt = mysqli_prepare($link, "INSERT INTO customers(email, password, first_name, last_name)
			VALUES (?, ?, ?, ?)");
		$bind = mysqli_stmt_bind_param($stmt, "ssss", $_POST['mail'], hash("whirlpool", $_POST['passwd']), $_POST['fname'], $_POST['lname']);
		$exec = mysqli_stmt_execute($stmt);
		$err = TRUE;
	}
	else
		$err = check_errors();
}
?>
