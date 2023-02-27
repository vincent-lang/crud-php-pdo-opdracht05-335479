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

$sql = "INSERT INTO Afspraak (Id
                        ,comfort
                        ,premium
                        ,all_in
                        ,jaarlidmaatschap
                        ,flex_optie
                        ,sportswater
                        ,coach
                        ,intro
                        ,email)
            VALUES      (NULL
                        ,:comfort
                        ,:premium
                        ,:all_in
                        ,:jaarlidmaatschap
                        ,:flex_optie
                        ,:sportswater
                        ,:coach
                        ,:intro
                        ,:email);";
$statement = $pdo->prepare($sql);

$statement->bindValue(":comfort", $_POST["comfort"], PDO::PARAM_STR);
$statement->bindValue(":premium", $_POST["premium"], PDO::PARAM_STR);
$statement->bindValue(":all_in", $_POST["all_in"], PDO::PARAM_STR);
$statement->bindValue(":jaarlidmaatschap", $_POST["jaarlidmaatschap"], PDO::PARAM_STR);
$statement->bindValue(":flex_optie", $_POST["flex_optie"], PDO::PARAM_STR);
$statement->bindValue(":sportswater", $_POST["sportswater"], PDO::PARAM_STR);
$statement->bindValue(":coach", $_POST["coach"], PDO::PARAM_STR);
$statement->bindValue(":intro", $_POST["intro"], PDO::PARAM_STR);
$statement->bindValue(":email", $_POST["email"], PDO::PARAM_STR);


$statement->execute();

header("location: read.php");
