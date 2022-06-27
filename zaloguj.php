<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$conn = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($conn->connect_errno!=0)
	{
		echo "Error: ".$conn->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
	
        $sql = "SELECT * FROM dane WHERE Login='$login' AND Password='$haslo'";
        if($rezultat = @$conn->query($sql))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['ID'] = $wiersz['ID'];
				$_SESSION['Login'] = $wiersz['Login'];
				$_SESSION['Password'] = $wiersz['Password'];
				$_SESSION['Email'] = $wiersz['Email'];
                $_SESSION['Imie'] = $wiersz['Imie'];
                $_SESSION['Nazwisko'] = $wiersz['Nazwisko'];
                $_SESSION['Plec'] = $wiersz['Plec'];
                $_SESSION['TypKarty'] = $wiersz['TypKarty'];
                $_SESSION['NumerKarty'] = $wiersz['NumerKarty'];
				$_SESSION['Admin'] = $wiersz['Admin'];

				unset($_SESSION['blad']);
				$rezultat->free_result();
				header('Location: gra.php');
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
			}
			
		}
		
		$conn->close();
	}
	
?>