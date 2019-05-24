<?PHP
	function open_conn($who)
	{
		if ($who === 'root')
		{
			$servername = "localhost:3306";
			$username = "root";
			$password = "rootroot";
			$dbname = "minishop";
		}
		$link = mysqli_connect($servername, $username, $password, $dbname);
		if (!$link)
			die("Connection failed: ".mysqli_connect_error());	
		return $link;
	}

	function fetch_users($link)
	{
		$sql = "SELECT id_customer, email, password, first_name, last_name, archive, admin FROM customers";
		if ($stmt = mysqli_prepare($link, $sql))
		{
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $id, $email, $passwd, $fname, $lname, $arch, $adm);
			while (mysqli_stmt_fetch($stmt))
				printf("%d - %s (%s) - %s, %s -- arch: %s, adm: %d\n", $id, $email, $passwd, $fname, $lname, $arch, $adm);
		}
		mysqli_stmt_close($stmt);
	}

	function usr_exist($link, $email)
	{
		$sql = "SELECT count(1) FROM customers WHERE email = ?";
		if ($stmt = mysqli_prepare($link, $sql))
		{
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $found);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
			if ($found)
				return 1;
			return 0;
		}
	}

	function add_user($link, $email, $pass, $fname, $lname, $arch, $adm)
	{
		$email = mysqli_real_escape_string($link, $email);
		$pass = mysqli_real_escape_string($link, $pass);
		$fname = mysqli_real_escape_string($link, $fname);
		$lname = mysqli_real_escape_string($link, $lname);
		$arch = mysqli_real_escape_string($link, $arch);
		$adm = mysqli_real_escape_string($link, $adm);

		if (!usr_exist($link, $email))
		{
			$sql = "INSERT INTO customers(email, password, first_name, last_name, archive, admin) 
				VALUES (?, ?, ?, ?, ?, ?)";
			if ($stmt = mysqli_prepare($link, $sql))
			{
				mysqli_stmt_bind_param($stmt, 'sssssi', $email, $pass, $fname, $lname, $arch, $adm);
				mysqli_stmt_execute($stmt);
				printf("Number of added users: %d.\n", mysqli_affected_rows($link));
				mysqli_stmt_close($stmt);
			}
		}
	}
	
	function del_user($link, $email)
	{
		$email = mysqli_real_escape_string($link, $email);
	
		$sql = "DELETE FROM customers WHERE email = ?";
		if ($stmt = mysqli_prepare($link, $sql))
		{
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			printf("Number of deleted users: %d.\n", mysqli_affected_rows($link));
			mysqli_stmt_close($stmt);
		}
	}

	function update_passwd($link, $email, $new_pass)
	{
		$email = mysqli_real_escape_string($link, $email);
		$sql = "UPDATE customers SET password = ? WHERE email = ?";
		if ($stmt = mysqli_prepare($link, $sql))
		{
			mysqli_stmt_bind_param($stmt, "ss", $new_pass, $email);
			mysqli_stmt_execute($stmt);
//			printf("Number of modified passwords: %d.\n", mysqli_affected_rows($link));
			mysqli_stmt_close($stmt);
		}
	}		
		
	function check_passwd($link, $email, $passwd)
	{
		$email = mysqli_real_escape_string($link, $email);
		$pass = mysqli_real_escape_string($link, $pass);		
		$sql = "SELECT count(1) FROM customers WHERE email = ? AND password = ?";
		if ($stmt = mysqli_prepare($link, $sql))
		{
			mysqli_stmt_bind_param($stmt, "ss", $email, $passwd);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $found_user);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
			if ($found_user)
				return 1;
			return 0;	
		}	
	}
	function check_admin($link, $email)
	{
		$email = mysqli_real_escape_string($link, $email);
		$sql = "SELECT count(1) from customers WHERE email = ? and admin = TRUE";
		if ($stmt = mysqli_prepare($link, $sql))
		{
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $found_admin);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
			if ($found_admin)
				return 1;
			return 0;
		}	
	}		

	function fetch_inventory($link)
	{
		$sql = "SELECT id_product, name, cat1, cat2, cat3, cat4, cat5, price, photo FROM inventory";
		$inventory = array();
		if ($stmt = mysqli_prepare($link, $sql))
		{
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $id_product, $name, $cat1, $cat2, $cat3, $cat4, $cat5, $price, $photo);
			while (mysqli_stmt_fetch($stmt))
				$inventory[$id_product] = array($name, $cat1, $cat2, $cat3, $cat4, $cat5, $price, $photo);
		}
		mysqli_stmt_close($stmt);
		return ($inventory);
	}	
/*
** Code below only for testing / debug purposes;
** example of testing shell command: "php manage_database.php user NewPass user"
*/
/*
	$mail = $argv[1];
	$pass = $argv[2];
	$mail2 = $argv[3];

	$link = open_conn('root');	
	if (!usr_exist($link, $mail))
		add_user($link, $mail, $pass, "guillaume", "calvi", "8734", FALSE);
	
	print("\nCustomers database\n");
	fetch_users($link);
	
	print("\nModify password\n");
	update_passwd($link, $mail, "NewPass");
	fetch_users($link);

	print("\nCheck admin\n");
	if (check_admin($link, $mail))
		print("User $mail is admin\n");
	else
		print("User $mail is not admin\n");

	print("\nCheck password\n");
	if (check_passwd($link, $mail2, $pass))
		print ("User and pass match\n");
	else
		print("Pass does not match\n");
	
	print("\nDeleted user $mail\n");
	del_user($link, $mail);
	fetch_users($link);

	print("\nFetch inventory $mail\n");
	$inv = fetch_inventory($link);
	print_r($inv);
		
	mysqli_close($link);
*/
?>
