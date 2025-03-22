<?php

require './db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $user = $DB->logUser($_POST['username']);
        if ($user) {
            if ($user['wachtwoord'] === $_POST['wachtwoord']) {
                session_start();
                $_SESSION['loggedInUser'] = $user['id'];
                header('Location: index.php');
            } else {
                $mess = "Invalide gebruikersnaam/wachtwoord combinatie";
            }
        } else {
            $mess = "Geen gebruiker gevonden";
        }
    } catch (Throwable $th) {
        // $mess = $th->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netland!</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Netland Admin Panel</h1>
    <?php

    if (isset($mess)) {
        echo "<h2 style='color:red'>$mess</h2>";
    }
    ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="wachtwoord" placeholder="Wachtwoord">
        <input type="submit" value="Login">
    </form>
</body>

</html>