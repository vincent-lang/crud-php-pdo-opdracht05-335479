<?php

require("config.php");

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
    } else {
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "INSERT INTO Inschrijving (Id
                        ,lidmaatschap
                        ,looptijd
                        ,sportswater
                        ,coach
                        ,intro
                        ,email
                        ,locations)
            VALUES      (NULL
                        ,:lidmaatschap
                        ,:looptijd
                        ,:sportswater
                        ,:coach
                        ,:intro
                        ,:email
                        ,:locations);";
$statement = $pdo->prepare($sql);

$statement->bindValue(":lidmaatschap", $_POST["lidmaatschap"], PDO::PARAM_STR);
$statement->bindValue(":looptijd", $_POST["looptijd"], PDO::PARAM_STR);
$statement->bindValue(":sportswater", $_POST["sportswater"], PDO::PARAM_STR);
$statement->bindValue(":coach", $_POST["coach"], PDO::PARAM_STR);
$statement->bindValue(":intro", $_POST["intro"], PDO::PARAM_STR);
$statement->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
$statement->bindValue(":locations", $_POST["locations"], PDO::PARAM_STR);


$statement->execute();

header("location: read.php");
