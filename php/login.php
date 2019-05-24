<?PHP
include ('../connexion.php');
if (isset($_POST['log']))
{
if (!isset($_POST['mail']))
	echo "Adresse mail ou mot de passe invalide.";
else if (!isset($_POST['passwd']))
	echo "Adresse mail ou mot de passe invalide";
else
{
	$passwd = hash("whirlpool", $_POST['passwd']);
	$mail = mysqli_real_escape_string($link, $_POST['mail']);
	$query = 'SELECT email,password FROM customers WHERE email="'.$mail.'" AND password="'.$passwd.'"';
	$array = mysqli_query($link, $query);
	if ( mysqli_fetch_assoc($array) === NULL)
	{
		$log = "Adresse mail ou mot de passe invalide";
	}
	else
	{
		$_SESSION['loggued_on_user'] = $_POST['mail'];
		header("Location: index.php");
	}
}
}
?>
