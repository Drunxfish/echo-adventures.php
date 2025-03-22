<?php

// onze Database ophalen
session_start();
require './db.php';


if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    die();
}


// Data over het film ophalen
if (isset($_GET['mediaID'])) {
    $media = $DB->selectMedia($_GET['mediaID']);
} else {
    header('Location: index.php');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="contain">
        <button class="knop"><a href="./index.php">&laquo; Terug</a></button>
        <div class="holder">
            <table>

                <h1><?php echo $media['titel'] ?></h1>
                <thead>
                    <tr>
                        <th>Information</th>
                        <th>Information</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Country</td>
                        <td><?php echo $media['land']; ?></td>
                    </tr>
                    <tr>
                        <td>Rating</td>
                        <td><?php echo $media['rating']; ?></td>
                    </tr>
                    <tr>
                        <td>Awards</td>
                        <td>
                            <?php

                            if (intval($media['awards']) <= 0) {
                                echo 'No Awards';
                            } else {
                                echo $media['awards'];
                            }

                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Seasons</td>
                        <td>
                            <?php

                            if (intval($media['seizoenen']) <= 0) {
                                echo '1';
                            } else {
                                echo $media['seizoenen'];
                            }

                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Datum van uitkomst</td>
                        <td><?php echo $media['releasedatum']; ?></td>
                    </tr>
                    <tr>
                        <td>Land van uitkomst</td>
                        <td><?php echo $media['land']; ?></td>
                    </tr>
                    <tr>
                        <td>Duur</td>
                        <td>
                            <?php

                            if ($media['duur'] <= 0) {
                                echo 'Episode standard';
                            } else {
                                echo $media['duur'] . ' minuten';
                            }
                            ?>
                        </td>
                    </tr>

                </tbody>
            </table>
            <?php

            if ($media['youtubetrailer'] != null) {
                echo '<div class="trailer">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/' . $media['youtubetrailer'] . '" 
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>';
            }

            ?>
            <div class="beschr">
                <h2>Beschrijving:</h2>
                <article>
                    <p><?php echo $media['omschrijving'] ?></p>
                </article>
            </div>
        </div>
    </div>
</body>

</html>