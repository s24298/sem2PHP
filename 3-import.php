<?php
// (A) CONNECT TO DATABASE - CHANGE SETTINGS TO YOUR OWN!
$dbHost = "localhost";
$dbName = "phpuser";
$dbChar = "utf8";
$dbUser = "root";
$dbPass = "";
try {
  $pdo = new PDO(
    "mysql:host=".$dbHost.";dbname=".$dbName.";charset=".$dbChar,
    $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }
 
$fh = fopen($_FILES["upcsv"]["tmp_name"], "r");
if ($fh === false) { exit("Failed to open uploaded CSV file"); }
 
while (($row = fgetcsv($fh)) !== false) {
  try {
      
    $stmt = $pdo->prepare("INSERT INTO `dane` (`Login`, `Password`,`Email`,`Imie`,`Nazwisko`,`Plec`,`TypKarty`,`NumerKarty`) VALUES (?,?,?,?,?,?,?,?)" );
      
    $stmt->execute([$row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]]);
  } catch (Exception $ex) { echo $ex->getmessage(); }
}
                    
fclose($fh);
echo "DONE.";