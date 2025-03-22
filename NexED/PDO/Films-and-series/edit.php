<?php

// onze database
require './db.php';
session_start();

if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    die();
}

// ID or be GONE !
if (isset($_GET['editID'])) {
    try {
        $med = $DB->selectMedia($_GET['editID']);
        $selectedFilm = (isset($med['soortmedia']) && $med['soortmedia'] == 'film') ? 'selected' : '';
        $selectedSerie = (isset($med['soortmedia']) && $med['soortmedia'] == 'serie') ? 'selected' : '';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    header("Location: ./index.php");
    die();
}





// Aanvrag behandelen
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $res = $DB->editMedia(
        $_GET['editID'],
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
        if ($med['soortmedia'] == 'serie') {
            header('Location: index.php?serieEdited=' . $med['id']);
        } elseif ($med['soortmedia'] == 'film') {
            header('Location: index.php?edited=' . $med['id']);
        } else {
            exit();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="contain-FW">
        <h1><?php echo $med['titel']; ?>
        </h1>
        <form method="post">
            <div>
                <label for="titel">Titel</label>
                <input type="text" value="<?php
                if (isset($med['titel'])) {
                    echo $med['titel'];
                }
                ?>
                    " name="titel" required>
            </div>
            <div>
                <label for="rating">Rating</label>
                <input type="text" value="<?php
                if (isset($med['rating'])) {
                    echo $med['rating'];
                }
                ?>" name="rating" required>
            </div>
            <div>
                <label for="omschrijving">Omschrijving</label>
                <textarea required name="omschrijving" rows="8" cols="24"><?php
                if (isset($med['omschrijving'])) {
                    echo $med['omschrijving'];
                }
                ?></textarea>
            </div>
            <div>
                <label for="awards">Aantal awards</label>
                <input type="text" value="<?php
                if (isset($med['awards'])) {
                    echo $med['awards'];
                }
                ?>" name="awards">
            </div>
            <div>
                <label for="duur">Lengte in minuten: </label>
                <input type="text" value="<?php
                if (isset($med['duur'])) {
                    echo $med['duur'];
                }
                ?>" name="duur">
            </div>
            <div>
                <label for="datum">Datum van uitkomst</label>
                <input type="date" min="1888-12-31" max="2024" name="datum" required>
            </div>
            <div>
                <label for="seizoenen">Seizoenen</label>
                <input type="text" value="<?php
                if (isset($med['seizoenen'])) {
                    echo $med['seizoenen'];
                }
                ?>" name="seizoenen">
            </div>
            <div>
                <label for="land">Land: </label>
                <input type="text" value="<?php
                if (isset($med['land'])) {
                    echo $med['land'];
                }
                ?>" name="land" required>
            </div>
            <div>
                <label for="ytID">YouTube trailer ID</label>
                <input type="text" value="<?php
                if (isset($med['youtubetrailer'])) {
                    echo $med['youtubetrailer'];
                }
                ?>" name="YT_ID">
            </div>
            <div>
                <label for="media">Type media: </label>
                <select class="inp" name="media" id="media" value required>
                    <option value="film" <?= $selectedFilm; ?>>film</option>
                    <option value="serie" <?= $selectedSerie; ?>>serie</option>
                </select>
            </div>
            <input class="knop" name="knop" type="submit" value="Aanmaken">
            <button class="knop"><a href="./index.php">&laquo; Terug</a></button>

        </form>
    </div>


</body>

</html>
