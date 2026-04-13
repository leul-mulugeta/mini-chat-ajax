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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie Instantanée</title>
    <link rel="stylesheet" href="css/style.css" />
    <script defer src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
    <script defer src="script.js"></script>
</head>

<body>
    <header>
        <p>Mon Pseudo : <span id="pseudo"><strong><?php echo $username ?></strong></span></p>
        <a href="logout.php" class="btn-logout">Déconnexion</a>
    </header>

    <main id="historique">
    </main>

    <form class="formulaire-message" onsubmit="event.preventDefault(); enregistrer();">
        <input type="text" id="message-input" name="message" placeholder="Saisissez votre message" required autocomplete="off" />
        <button type="submit" id="btn-enregistrer">Envoyer</button>
    </form>
</body>

</html>