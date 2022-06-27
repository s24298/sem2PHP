<?php

	session_start();
	
	require_once "connect.php";

	$conn = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($conn->connect_errno!=0)
	{
		echo "Error: ".$conn->connect_errno;
	}
	else
	{
        $ID = $_SESSION['ID'];
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
                header('Location: gra.php');

            }else 
            {
                unset($_SESSION['blad_hasla']);
                
                $res = $conn->query("UPDATE `dane` SET `Login`= '$login' AND `Password`='$haslo' AND `Email`='$email' AND `Imie`='$imie' AND `Nazwisko`='$nazwisko' AND `Plec`='$plec' AND `TypKarty`='$typKarty' AND `NumerKarty`= '$numerKarty' WHERE `id`= '$ID' AND `Admin` = '0' ");
                
               
                $conn->close();
                header('Location: gra.php');
             
            
        } //if - haslo

}
		