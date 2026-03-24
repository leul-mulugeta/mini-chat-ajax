<?php

require_once("../src/DBConnection.php");

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
		$query = 'SELECT * FROM user WHERE username = :username';
		$statement = $linkpdo->prepare($query);
		$statement->bindValue(':username', $username);
		$statement->execute();

		$user = $statement->fetch();
		if (!$user || !password_verify($password, $user['password'])) {
			$erreur = 'Identifiants de connexion non reconnus. Vérifiez votre pseudo ou mot de passe.';
		} else {
			session_regenerate_id(true);
			$_SESSION['username'] = $username;
			header("Location: index.php");
		}
	}
}

?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<title>Messagerie Instantanée - Connexion</title>
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div class="page-connexion">
		<div class="boite-connexion">
			<h1>Connexion</h1>

			<form method="post" action="login.php">
				<label for="username">Pseudo</label>
				<input type="text" id="username" name="username" placeholder="Pseudo" required />

				<label for="password">Mot de passe</label>
				<input type="password" id="password" name="password" placeholder="Mot de passe" required />

				<button type="submit" id="btn-connecter">Se connecter</button>
			</form>
			<button class="toggle-link"><a href="register.php">Créer un compte</a></button>
			<?php if ($erreur) { ?>
				<p class="erreur">
					<?= $erreur ?>
				</p>
			<?php } ?>
		</div>
	</div>
</body>

</html>