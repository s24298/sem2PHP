<?php
$dbHost = "localhost";
$dbName = "phpuser";
$dbChar = "utf8";
$dbUser = "root";
$dbPass = "";

try {
  $pdo = new PDO(
    "mysql:host=$dbHost;dbname=$dbName;charset=$dbChar",
    $dbUser, $dbPass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
    ]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }

header("Content-Type: application/octet-stream");
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"export.csv\"");
 
$stmt = $pdo->prepare("SELECT * FROM `dane`");
$stmt->execute();
while ($row = $stmt->fetch()) {
  echo implode(",", [$row["ID"], $row["Login"], $row["Password"],$row["Email"],$row["Imie"],$row["Nazwisko"],$row["Plec"],$row["TypKarty"],$row["NumerKarty"]]);
  echo "\r\n";
}