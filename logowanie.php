<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: gra.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl" style="text-align: center;">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Logowanie</title>
     <link rel="stylesheet" href="RejestracjaMain.css">
    <script>
    
    function Ok(){
        if(){
            return true;   
           }
        else{
            return false;   
           }
        
    }
    
    </script>
</head>

<body>
    
    
    <div style="border-style: dotted;" id="login"> 
        <p>LOGOWANIE</p>

        <form action="zaloguj.php" method="post">

            Login: <br /> <input type="text" onchange="" name="login" /> <br />
            Hasło: <br /> <input type="password" name="haslo" /> <br /><br />


            <input type="submit"  value="Zaloguj się" />

        </form>
        
        <?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
        ?>
        
    </div>
    
<a href="index.php"> POWROT</a>

</body>
</html>