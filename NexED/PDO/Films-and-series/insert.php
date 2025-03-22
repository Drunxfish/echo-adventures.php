<?php

require './db.php';
session_start();

if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        $res = $DB->insertMedia(
            $_POST['titel'],
            $_POST['rating'],
            $_POST['omschrijving'],
            $_POST['awards'],
            $_POST['duur'],
            $_POST['datum'],
            $_POST['seizoenen'],
            $_POST['land'],
            $_POST['YT_ID'],
            $_POST['media']
        );
        if ($res) {
            if ($_POST['media'] == 'film') {
                header('Location:./index.php?toegevoegd=' . $DB->pdo->lastInsertId());
            } elseif ($_POST['media'] == 'serie') {
                header('Location:./index.php?Stoegevoegd=' . $DB->pdo->lastInsertId());
                die();
            }
        } else {
            echo '<script>alert("FILM kon niet worden toegevoegd")</script>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="contain-FW">
        <h1>Media Toevoegen</h1>
        <form method="post">
            <div>
                <label for="titel">Titel</label>
                <input type="text" value="" name="titel" required>
            </div>
            <div>
                <label for="rating">Rating</label>
                <input type="text" value="" name="rating" required>
            </div>
            <div>
                <label for="omschrijving">Omschrijving</label>
                <textarea required name="omschrijving" rows="8" cols="24"></textarea>
            </div>
            <div>
                <label for="awards">Aantal awards</label>
                <input type="text" value="" name="awards">
            </div>
            <div>
                <label for="duur">Lengte in minuten: </label>
                <input type="number" value="" name="duur">
            </div>
            <div>
                <label for="datum">Datum van uitkomst</label>
                <input type="date" value="" min="1888-12-31" max="2024" name="datum" required>
            </div>
            <div>
                <label for="seizoenen">Seizoenen</label>
                <input type="text" value="" name="seizoenen">
            </div>
            <div>
                <label for="land">Land: </label>
                <input type="text" value="" name="land" required>
            </div>
            <div>
                <label for="ytID">YouTube trailer ID</label>
                <input type="text" value="" name="YT_ID">
            </div>
            <div>
                <label for="media">Type media: </label>
                <select class="inp" name="media" id="media" required>
                    <option value="film">film</option>
                    <option value="serie">serie</option>
                </select>
            </div>
            <input class="knop" name="knop" type="submit" value="Aanmaken">
            <button class="knop"><a href="./index.php">&laquo; Terug</a></button>

        </form>
    </div>


</body>

</html>