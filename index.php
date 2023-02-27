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
        <select name="" id="" required>
            <option value=""></option>
        </select>
        <br>
        <label for="1">Selecteer een lidmaatschap:</label>
        <input type="radio" name="1" id="comfort" required>Comfort
        <input type="radio" name="1" id="premium" required>Premium
        <input type="radio" name="1" id="all_in" required>All in
        <br>
        <br>
        <label for="2">Looptijd:</label>
        <input type="radio" name="2" id="jaarlidmaatschap" required>Jaarlidmaatschap
        <input type="radio" name="2" id="flex_optie" required>Flex optie
        <br>
        <br>
        <label for="">Selecteer je extra's:</label>
        <input type="checkbox" name="sportswater" id="sportswater">Yanga sportswater € 2,50 per 4 weken
        <input type="checkbox" name="coach" id="coach">Personal online coach € 60,00 eenmalig
        <input type="checkbox" name="intro" id="intro">Personal training intro € 25,00 eenmalig
        <br>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email">
        <br>
        <input id="submit" type="submit" value="Sla op">
        <input id="reset" type="reset" value="reset">
        <input type="hidden" name="hidden" value="datetime-local">
        </fieldset>
    </form>
</body>

</html>