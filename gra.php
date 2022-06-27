<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl" style=" text-align: center;">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>USER ACC</title>
     <link rel="stylesheet" href="RejestracjaMain.css">
</head>

<body>
	
<?php
    
    echo "<div id='user' > ";
	echo "<p>Witaj ".$_SESSION['Login'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
	echo "<p><b>Login</b>: ".$_SESSION['Login'];
	echo " | <b>Password</b>: ".$_SESSION['Password'];
	echo " | <b>Email</b>: ".$_SESSION['Email']."</p>";
	echo " | <b>Imie</b>: ".$_SESSION['Imie']."</p>";
	echo " | <b>Nazwisko</b>: ".$_SESSION['Nazwisko']."</p>";
	echo " | <b>Plec</b>: ".$_SESSION['Plec']."</p>";
	echo " | <b>TypKarty</b>: ".$_SESSION['TypKarty']."</p>";
	echo " | <b>NumerKarty</b>: ".$_SESSION['NumerKarty']."</p>";
	echo "</div><br/> ";//user
    
    //USER USUWANIE ################################################################################################################
             echo " <div id='usuwanie' style='border:red solid 2px;'>
                <form action='delete.php' method='post'>

                USUN KONTO: <br />  <br />
                  <input type='checkbox' id='usun' name='usun' value='usun'>
                  <label for='usun'> Chce Usunac Konto</label><br><br>
                  <input type='submit'  value='USUN' />

                </form> </div> <br/>";//usuwanie // pamietaj dodac checboxa
    //USER ZMIEN
                echo "<div id='dodanie' style='border:green solid 2px'>";
        echo  "<form action='zmien.php' method='post'>";

        echo " <br/>ZMIANA DANYCH <br><br>   ID <br /><input type='text' onchange='' name='ID' /> <br />
                    E-mail <br /> <input type='text' onchange='' name='email' /> <br />
                    Login: <br /> <input type='text' onchange='' name='login' /> <br />
                    Hasło: <br /> <input type='password' name='haslo' /> <br />
                    Powtorz Hasło: <br /> <input type='password' name='rhaslo' /> <br /><br /> <br /><br />
                    
                    Imie: <br /> <input type='text' name='imie' /> <br />
                    Nazwisko: <br /> <input type='text' name='nazwisko' /> <br />
                    <br/> 
                    
                    <label for='plec'>Plec:</label>
                      <select name='plec' id='plec'>
                        <option value='Mezczyzna'>Mezczyzna</option>
                        <option value='Kobieta'>Kobieta</option>
                        <option value='HelikopterBojowy'>Helikopter Bojowy</option>
                        <option value='NieChcePodawac'>Nie Chce Podawac</option>
                      </select>
                    
                    <br/> <br/> 
                    
                    <label for='karty'>Typ Karty:</label>
                      <select name='typKarty' id='typKarty'>
                        <option value='Kredytowa'>Kredytowa</option>
                        <option value='Debetowa'>Debetowa</option>
                        <option value='Platnicza'>Platnicza</option>
                      </select>
                    
                    <br/> <br/> 
                    Numer Karty: <br /> <input type='text' name='numerKarty' /> <br /> <br/> 
                    <input type='submit'  value='Zmien dane uzytkownika' />
                </form>";
    
            echo "</div> <br/> ";//zmiana 
    
    
    
    if($_SESSION['Admin']==1)
    {
        
        echo "<div id='admin' style='border:solid black 5px;'> ";
        echo "STREFA ADMINISTRATORA <br><br><br>";
        echo " | <b>ID</b>: ".$_SESSION['ID']."</p>";
        //POBIERANIE ################################################################################################################
        echo  "<p><b>Admin</b>: ".$_SESSION['Admin'];
        echo  "<br><br><a href='exportCVS.php'>POBIERZ DANE</a>";
        
        //PRZESYLANIE ################################################################################################################
        echo  "<br><br> <form action='3-import.php' method='post' enctype='multipart/form-data'>";
        echo  "<br><input type='file' name='upcsv' accept='.csv' required/>";
        echo  "<input type='submit' value='Upload'/>";
        echo "</form> <br><br><br><br><br>";

        //NOWY UZYTKOWNIK ################################################################################################################
        echo "<div id='dodanie' style='border:blue solid 2px'>";
        echo  "<form action='register.php' method='post'>";

        echo " DODAJ UZYTKOWNIKA: <br><br>E-mail <br /> <input type='text' onchange='' name='email' /> <br />
                    Login: <br /> <input type='text' onchange='' name='login' /> <br />
                    Hasło: <br /> <input type='password' name='haslo' /> <br />
                    Powtorz Hasło: <br /> <input type='password' name='rhaslo' /> <br /><br /> <br /><br />
                    
                    Imie: <br /> <input type='text' name='imie' /> <br />
                    Nazwisko: <br /> <input type='text' name='nazwisko' /> <br />
                    <br/> 
                    
                    <label for='plec'>Plec:</label>
                      <select name='plec' id='plec'>
                        <option value='Mezczyzna'>Mezczyzna</option>
                        <option value='Kobieta'>Kobieta</option>
                        <option value='HelikopterBojowy'>Helikopter Bojowy</option>
                        <option value='NieChcePodawac'>Nie Chce Podawac</option>
                      </select>
                    
                    <br/> <br/> 
                    
                    <label for='karty'>Typ Karty:</label>
                      <select name='typKarty' id='typKarty'>
                        <option value='Kredytowa'>Kredytowa</option>
                        <option value='Debetowa'>Debetowa</option>
                        <option value='Platnicza'>Platnicza</option>
                      </select>
                    
                    <br/> <br/> 
                    Numer Karty: <br /> <input type='text' name='numerKarty' /> <br /> <br/> 
                    <input type='submit'  value='Dodaj nowego uzytkownika' />
                </form> ";
            echo "</div> <br/>";//dodawanie
        
        //Zmiana ################################################################################################################
        echo "<div id='dodanie' style='border:green solid 2px'>";
        echo  "<form action='zmienAdmin.php' method='post'>";

        echo " <br/> ZMIEN DANE UZYTKOWNIKA: <br><br>  ID <br /><input type='text' onchange='' name='ID' /> <br />
                    E-mail <br /> <input type='text' onchange='' name='email' /> <br />
                    Login: <br /> <input type='text' onchange='' name='login' /> <br />
                    Hasło: <br /> <input type='password' name='haslo' /> <br />
                    Powtorz Hasło: <br /> <input type='password' name='rhaslo' /> <br /><br /> <br /><br />
                    
                    Imie: <br /> <input type='text' name='imie' /> <br />
                    Nazwisko: <br /> <input type='text' name='nazwisko' /> <br />
                    <br/> 
                    
                    <label for='plec'>Plec:</label>
                      <select name='plec' id='plec'>
                        <option value='Mezczyzna'>Mezczyzna</option>
                        <option value='Kobieta'>Kobieta</option>
                        <option value='HelikopterBojowy'>Helikopter Bojowy</option>
                        <option value='NieChcePodawac'>Nie Chce Podawac</option>
                      </select>
                    
                    <br/> <br/> 
                    
                    <label for='karty'>Typ Karty:</label>
                      <select name='typKarty' id='typKarty'>
                        <option value='Kredytowa'>Kredytowa</option>
                        <option value='Debetowa'>Debetowa</option>
                        <option value='Platnicza'>Platnicza</option>
                      </select>
                    
                    <br/> <br/> 
                    Numer Karty: <br /> <input type='text' name='numerKarty' /> <br /> <br/> 
                    <input type='submit'  value='Zmien dane uzytkownika' />
                </form><br/> ";
            echo "</div> <br/> ";//zmiana 
        
         //Usuwanie ################################################################################################################
         echo " <div id='usuwanie' style='border:red solid 2px;'>
                <form action='deleteAdmin.php' method='post'>

                USUN UZYTKOWNIKA O ID: <br /> <input type='text' onchange='' name='idik' /> <br />

                <input type='submit'  value='USUN' />

                </form> </div>";//usuwanie

        echo "</div>";//admin
    }
?>

</body>
</html>