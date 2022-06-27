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
                
                $res = $conn->query("DELETE FROM `dane` WHERE `ID` = '$ID' AND 'Admin'= 0");
                $conn->close();
                session_unset();
                header('Location: index.php');
             
            
    } 

		