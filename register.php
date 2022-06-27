<?php

	session_start();
	
//	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
//	{
//		header('Location: index.php');
//		exit();
//	}

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
        $rhaslo = $_POST['rhaslo'];
        $email = $_POST['email'];
        
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $plec = $_POST['plec'];
        $typKarty = $_POST['typKarty'];
        $numerKarty = $_POST['numerKarty'];
        
        
        
            if($haslo!=$rhaslo)
            {
                $_SESSION['blad_hasla'] = '<span style="color:red">Rozne Hasla!</span>';
                header('Location: rejestracja.php');

            }else 
            {
                unset($_SESSION['blad_hasla']);
                
                // $sql =  ;
                $res = $conn->query("INSERT INTO `dane` (`ID`, `Login`, `Password`, `Email`, `Imie`, `Nazwisko`, `Plec`, `TypKarty`, `NumerKarty`, `Admin`) VALUES (NULL, '$login', '$haslo', '$email', '$imie', '$nazwisko', '$plec', '$typKarty', '$numerKarty', '0')");
                
                //$res = $conn->query( "INSERT INTO dane (Login,Password,Email) VALUES ('$login','$haslo','$email')" ) or die("Blad");
                $conn->close();
                header('Location: index.php');
             
            
        } //if - haslo

}
		