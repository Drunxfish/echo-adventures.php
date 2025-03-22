<?php

require './db.php';
session_start();

if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    die();
}




$data = $DB->selectMedia();
$series = [];
$film = [];

// FILMS en SERIES apart houden voor tabels
foreach ($data as $SR) {
    if ($SR['soortmedia'] == 'serie') {
        $series[] = $SR;
    } elseif ($SR['soortmedia'] == 'film') {
        $film[] = $SR;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Welkom op het dashboard <a href="./logout.php"><button>UITLOGGEN</button></a></h1>

    <br>
    <br>
    <div class="container">
        <a href="insert.php"><button class="button-30" role="button">Media Toevoegen</button></a>
        </button>
        <h1>Welkom op het netland beheerders paneel</h1>
        <div>
            <table>
                <h3>Series</h3>
                <thead>
                    <tr>
                        <!-- // sorteren via GET  -->
                        <th><a href="?
                        <?php

                        if (isset($_GET['title'])) {
                            echo 'titledesc';
                        } else {
                            echo 'title';
                        }

                        ?>">Title</a></th>
                        <th><a href="?
                        <?php

                        if (isset($_GET['sort'])) {
                            echo 'ord';
                        } else {
                            echo 'sort';
                        }

                        ?>">Rating</a></th>
                        <th colspan="2">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    // ORDER !
                    if (isset($_GET['sort'])) {
                        $series = $DB->selectSeries(null, true, false);
                    } elseif (isset($_GET['ord'])) {
                        $series = $DB->selectSeries(null, false, true);
                    } elseif (isset($_GET['title'])) {
                        $series = $DB->selectSeries(null, false, false, true, false);
                    } elseif (isset($_GET['titledesc'])) {
                        $series = $DB->selectSeries(null, false, false, false, true);
                    } else {
                        $series = $DB->selectSeries();
                    }

                    // Series ophalen
                    foreach ($series as $s) {
                        if (isset($_GET['serieEdited']) && $_GET['serieEdited'] == $s['id']) {
                            echo '<tr class="edited">';
                        } elseif (isset($_GET['Stoegevoegd']) && $_GET['Stoegevoegd'] == $s['id']) {
                            echo '<tr class="edited">';
                        } else {
                            echo "<tr>";
                        }
                        echo "<td>" . $s['titel'] . "</td>";
                        echo "<td>" . $s['rating'] . "</td>";
                        echo '<td><a href="detail.php?mediaID=' . $s['id'] . '">Bekijk details</a></td>';
                        echo '<td><a href="edit.php?editID=' . $s['id'] . '">Wijzigen</a></td>';
                        echo "</tr>";
                    }

                    if (isset($_GET['sort'])) {
                        echo '<span>Active sorting: rating descending</span>';
                    } elseif (isset($_GET['ord'])) {
                        echo '<span>Active sorting: rating ascending</span>';
                    } elseif (isset($_GET['title'])) {
                        echo '<span>Active sorting: title descending</span>';
                    } elseif (isset($_GET['titledesc'])) {
                        echo '<span>Active sorting: title descending</span>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div>
            <table>
                <h3>Films</h3>
                <thead>
                    <tr>
                        <th><a href="?
                        <?php

                        if (isset($_GET['filmASC'])) {
                            echo 'filmDESC';
                        } else {
                            echo 'filmASC';
                        }

                        ?>">Title</a></th>
                        <th><a href="?
                        <?php

                        if (isset($_GET['duurASC'])) {
                            echo 'duurDESC';
                        } else {
                            echo 'duurASC';
                        }

                        ?>">Duur</a></th>
                        <th colspan="2">Details</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // I WILL HAVE ORDER
                    
                    if (isset($_GET['filmASC'])) {
                        $film = $DB->selectFilms(null, true, false, false, false);
                    } elseif (isset($_GET['filmDESC'])) {
                        $film = $DB->selectFilms(null, false, true, false, false);
                    } elseif (isset($_GET['duurASC'])) {
                        $film = $DB->selectFilms(null, false, false, true, false);
                    } elseif (isset($_GET['duurDESC'])) {
                        $film = $DB->selectFilms(null, false, false, false, true);
                    } else {
                        $film = $DB->selectFilms();
                    }

                    // AND FANCYNESS
                    foreach ($film as $FM) {
                        if (isset($_GET['edited']) && $_GET['edited'] == $FM['id']) {
                            echo '<tr class="edited">';
                        } elseif (isset($_GET['toegevoegd']) && $_GET['toegevoegd'] == $FM['id']) {
                            echo '<tr class="edited">';
                        } else {
                            echo "<tr>";
                        }
                        echo "<td>" . $FM['titel'] . "</td>";
                        echo "<td>" . $FM['duur'] . "</td>";
                        echo '<td><a href="detail.php?mediaID=' . $FM['id'] . '">Bekijk details</a></td>';
                        echo '<td><a href="edit.php?editID=' . $FM['id'] . '">Wijzigen</a></td>';
                        echo "</tr>";
                    }
                    if (isset($_GET['filmASC'])) {
                        echo '<span>Active sorting: title descending</span>';
                    } elseif (isset($_GET['filmDESC'])) {
                        echo '<span>Active sorting: title ascending</span>';
                    } elseif (isset($_GET['duurASC'])) {
                        echo '<span>Active sorting: Duur ascending</span>';
                    } elseif (isset($_GET['duurDESC'])) {
                        echo '<span>Active sorting: Duur descending</span>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>



</body>

</html>