<?php

require_once("../DBConnection.php");

header('Content-Type: application/json');

try {
    $db = DBConnection::getInstance();
    $linkpdo = $db->getConnection();

    $requete = 'SELECT * FROM (SELECT * FROM message ORDER BY date_heure DESC LIMIT 10) SUB ORDER BY date_heure ASC';
    $statement = $linkpdo->prepare($requete);
    $statement->execute();

    $messages = [];
    while ($row = $statement->fetch()) {
        $messages[] = array('messageId' => $row['message_id'], 'dateHeure' => $row['date_heure'], 'auteur' => $row['auteur'], 'contenu' => $row['contenu']);
    }

    echo json_encode(['success' => true, 'data' => $messages]);
} catch (Exception $e) {
    error_log("Unexpected Error: " . $e->getMessage());
    echo json_encode(['success' => false]);
}
