<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: gra.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>REJESTRACJA</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="RejestracjaMain.css">

</head>

<body>
    
    
    
    <br><br>
    
            <div id="register"> 
                <p>REJESTRACJA</p>

                <form action="register.php" method="post" id="form">

                    E-mail <br /> <input type="text" onchange="" name="email" /> <br />
                    Login: <br /> <input type="text" onchange="" name="login" /> <br /><br />
                    
                    <div class="wrapper">
                        <div class="container">
                         Haslo:<br><input type="password" id="password" name="password" oninput="strengthChecker()">
                            <span id="toggle" onclick="toggle()">
                                <i class="fas fa-eye"></i>
                            </span>
                            <div id="strength-bar"></div>
                        </div>
                        <p id="msg"></p>
                    </div> <br />
                    
                    Powtorz Hasło: <br /> <input type="password" name="rhaslo" /><br />
                    Imie: <br /> <input type="text" name="imie" /> <br/>
                    Nazwisko: <br /> <input type="text" name="nazwisko" /> <br/><br/> 
                    
                    <label for="plec">Plec:</label>
                      <select name="plec" id="plec">
                        <option value="Mezczyzna">Mezczyzna</option>
                        <option value="Kobieta">Kobieta</option>
                        <option value="HelikopterBojowy">Helikopter Bojowy</option>
                        <option value="NieChcePodawac">Nie Chce Podawac</option>
                    </select>
                    
                    <br/> <br/> 
                    
                    <label for="karty">Typ Karty:</label>
                      <select name="typKarty" id="typKarty">
                        <option value="Kredytowa">Kredytowa</option>
                        <option value="Debetowa">Debetowa</option>
                        <option value="Platnicza">Platnicza</option>
                      </select>
                    
                    <br/> <br/> 
                    Numer Karty: <br /> <input type="text" name="numerKarty" /> <br /> <br/> 

                    <input type="submit"  value="Zarejestruj się" />

                </form>

                    <?php
            if(isset($_SESSION['blad_hasla']))	echo $_SESSION['blad_hasla'];
                ?>
<a href="index.php"> POWROT</a> 
            </div>
    
    
    
<script src="script.js"></script>

</body>
</html>