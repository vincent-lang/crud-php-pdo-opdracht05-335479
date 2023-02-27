<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
    } else {
    }
} catch (PDOException $e) {
    $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {

        $sql = "UPDATE Inschrijving
            Set     lidmaatschap = :lidmaatschap,
                    looptijd = :looptijd,
                    sportswater = :sportswater,
                    coach = :coach,
                    intro = :intro,
                    email = :email,
                    locations = :locations
                WHERE   Id = :id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(":id", $_POST["id"], PDO::PARAM_INT);
        $statement->bindValue(":lidmaatschap", $_POST["lidmaatschap"], PDO::PARAM_STR);
        $statement->bindValue(":looptijd", $_POST["looptijd"], PDO::PARAM_STR);
        $statement->bindValue(":sportswater", $_POST["sportswater"], PDO::PARAM_STR);
        $statement->bindValue(":coach", $_POST["coach"], PDO::PARAM_STR);
        $statement->bindValue(":intro", $_POST["intro"], PDO::PARAM_STR);
        $statement->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
        $statement->bindValue(":locations", $_POST["locations"], PDO::PARAM_STR);

        $statement->execute();

        echo "het record is geupdate";
        header('location: read.php');

        exit();
    } catch (PDOException $e) {
        echo "het record is niet geupdate, probeer het opnieuw";
        header("location: read.php");
    }
}

$sql = "SELECT Id
              ,lidmaatschap as LM
              ,looptijd as LT
              ,sportswater as SW
              ,coach as C
              ,intro as I
              ,email as E
              ,locations as L
        FROM Inschrijving
        WHERE Id = :Id";

$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['id'], PDO::PARAM_INT);

$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/anon.png" type="image/x-icon">
    <title>BASIC-FIT Utrecht</title>
</head>

<body>
    <h1>BASIC-FIT Utrecht</h1>
    <form action="create.php" method="post">
        <p>Kies je homeclub:</p>
        <select name="locations" id="locations" value="<?= $result->L ?>" required>
            <option value="moreelsehoek_2">moreelsehoek_2</option>
        </select>
        <br>
        <label for="lidmaatschap">Selecteer een lidmaatschap:</label>
        <input type="radio" name="lidmaatschap" id="comfort" value="<?= $result->LM ?>" required>Comfort
        <input type="radio" name="lidmaatschap" id="premium" value="<?= $result->LM ?>" required>Premium
        <input type="radio" name="lidmaatschap" id="all_in" value="<?= $result->LM ?>" required>All in
        <br>
        <br>
        <label for="looptijd">Looptijd:</label>
        <input type="radio" name="looptijd" id="jaarlidmaatschap" value="<?= $result->LT ?>" required>Jaarlidmaatschap
        <input type="radio" name="looptijd" id="flex_optie" value="<?= $result->LT ?>" required>Flex optie
        <br>
        <br>
        <label for="">Selecteer je extra's:</label>
        <input type="checkbox" name="sportswater" id="sportswater" value="<?= $result->SW ?>">Yanga sportswater € 2,50 per 4 weken
        <input type="checkbox" name="coach" id="coach" value="<?= $result->C ?>">Personal online coach € 60,00 eenmalig
        <input type="checkbox" name="intro" id="intro" value="<?= $result->I ?>">Personal training intro € 25,00 eenmalig
        <br>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="<?= $result->E ?>">
        <br>
        <input id="submit" type="submit" value="Sla op">
        <input id="reset" type="reset" value="reset">
        <input type="hidden" name="hidden" value="datetime-local">
        </fieldset>
    </form>
</body>

</html>