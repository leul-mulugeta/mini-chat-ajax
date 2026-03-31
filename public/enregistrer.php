<?php

require_once("../DBConnection.php");

header('Content-Type: application/json');

// Vérifier que les données existent
if (!isset($_POST['auteur']) || !isset($_POST['message'])) {
	echo json_encode(['success' => false, 'error' => 'Paramètres manquants']);
	exit;
}

$auteur = trim($_POST['auteur']);
$message = trim($_POST['message']);

// Vérifier que ce n'est pas vide
if ($auteur === '' || $message === '') {
	echo json_encode(['success' => false, 'error' => 'Champs vides']);
	exit;
}

try {
	$db = DBConnection::getInstance();
	$linkpdo = $db->getConnection();

	$dateHeure = new DateTime();

	$requete = 'INSERT INTO message (date_heure, auteur, contenu) VALUES (:date_heure, :auteur, :contenu)';
	$statement = $linkpdo->prepare($requete);
	$statement->bindValue(':date_heure', $dateHeure->format('Y-m-d H:i:s'), PDO::PARAM_STR);
	$statement->bindValue(':auteur', $auteur, PDO::PARAM_STR);
	$statement->bindValue(':contenu', $message, PDO::PARAM_STR);
	$statement->execute();

	echo json_encode(['success' => true]);
} catch (Exception $e) {
	error_log("Unexpected Error: " . $e->getMessage());
	echo json_encode(['success' => false]);
}
