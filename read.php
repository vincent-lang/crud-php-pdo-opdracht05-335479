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

$sql = "SELECT Id
            ,lidmaatschap
            ,looptijd
            ,sportswater
            ,coach
            ,intro
            ,email
            ,locations
        FROM Inschrijving
        ORDER BY Id ASC";

$statement = $pdo->prepare($sql);

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_OBJ);

$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                <td>$info->Id</td>
                <td>$info->lidmaatschap</td>
                <td>$info->looptijd</td>
                <td>$info->sportswater</td>
                <td>$info->coach</td>
                <td>$info->intro</td>
                <td>$info->email</td>
                <td>$info->locations</td>
                <td>
                    <a href='delete.php?id={$info->Id}'>
                        <img src='img/b_drop.png' alt='Drop'</img>
                    </a>
                </td>
                <td>
                    <a href='update.php?id={$info->Id}'>
                        <img src='img/b_edit.png' alt='Edit'</img>
                    </a>
                </td>
            </tr>";
}

?>


<h3>Tabel Inschrijving</h3>
<a href="index.php"><button>opnieuw inschrijven</button></a>
<table border="1">
    <thead>
        <th>Id</th>
        <th>lidmaatschap</th>
        <th>looptijd</th>
        <th>sportswater</th>
        <th>coach</th>
        <th>intro</th>
        <th>email</th>
        <th>locations</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?= $rows; ?>
    </tbody>
</table>