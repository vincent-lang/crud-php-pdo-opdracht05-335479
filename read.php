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
            ,comfort
            ,premium
            ,all_in
            ,jaarlidmaatschap
            ,flex_optie
            ,sportswater
            ,coach
            ,intro
            ,email
        FROM Inschrijving
        ORDER BY Id ASC";

$statement = $pdo->prepare($sql);

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_OBJ);

$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                <td>$info->Id</td>
                <td>$info->comfort</td>
                <td>$info->premium</td>
                <td>$info->all_in</td>
                <td>$info->jaarlidmaatschap</td>
                <td>$info->flex_optie</td>
                <td>$info->sportswater</td>
                <td>$info->coach</td>
                <td>$info->intro</td>
                <td>$info->email</td>
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
        <th>color1</th>
        <th>color2</th>
        <th>color3</th>
        <th>color4</th>
        <th>Tel</th>
        <th>Email</th>
        <th>Datum</th>
        <th>Nagelbijt</th>
        <th>Luxemanicure</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?= $rows; ?>
    </tbody>
</table>