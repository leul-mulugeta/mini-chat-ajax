<?php

require_once("../DBConnection.php");

session_start();

if (isset($_SESSION['username'])) {
	header("Location: index.php");
	exit;
}

$erreur = '';

$db = DBConnection::getInstance();
$linkpdo = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (empty($username) || empty($password)) {
		$erreur = "Veuillez renseigner tous les champs obligatoires.";
	} else {
		try {
			$query = 'INSERT INTO user (username, password) VALUES (:username, :password)';
			$statement = $linkpdo->prepare($query);
			$statement->bindValue(':username', $username);
			$statement->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));

			if ($statement->execute()) {
				session_regenerate_id(true);
				$_SESSION['username'] = $username;
				header("Location: index.php");
			}
		} catch (PDOException $e) {
			$erreur = "Ce pseudo est déjà utilisé par un autre membre. Merci d'en choisir un différent.";
		}
	}
}

?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<title>Messagerie Instantanée - Inscription</title>
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div class="page-connexion">
		<div class="boite-connexion">
			<h1>Inscription</h1>

			<form method="post" action="register.php">
				<label for="username">Pseudo</label>
				<input type="text" id="username" name="username" placeholder="Pseudo" required />

				<label for="passwor">Mot de passe</label>
				<input type="password" id="password" name="password" placeholder="Mot de passe" required />

				<button type="submit" id="btn-connecter">Créer un compte</button>
			</form>
			<button class="toggle-link"><a href="login.php">Se connecter</a></button>
			<?php if ($erreur) { ?>
				<p class="erreur">
					<?= $erreur ?>
				</p>
			<?php } ?>
		</div>
	</div>
</body>

</html>