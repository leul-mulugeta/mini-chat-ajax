<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = htmlspecialchars($_SESSION['username']);

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Messagerie Instantanée</title>
    <link rel="stylesheet" href="css/style.css" />
    <script defer src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
    <script defer src="script.js"></script>
</head>

<body>
    <header><button><a href="logout.php">Déconnexion</a></button></header>

    <p>Mon Pseudo : <span id="pseudo"><strong><?php echo $username ?></strong></span></p>
    <div id="historique"></div>
    <input type="text" id="message" name="message" placeholder="Saisissez votre message" autocomplete="off" />
    <button type="button" id="btn-enregistrer" onclick="enregistrer()">Envoyer</button>
</body>

</html>