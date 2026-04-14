SET NAMES 'utf8mb4';

INSERT INTO user (username, password) VALUES
('Alice', '$2y$10$yN21.Hx3igsYD45BCq/rt.XhRyFSY5uaTVlt3NE0ulCllqaxW6n7a'),
('Bob', '$2y$10$tg6tVJXmKEJiXKf87H1G5u/flvgPv4sZXnudcYTJnGXYIWolpiYa6'),
('Charlie', '$2y$10$Uj3G.Y5bK7AGA6ffh6pTiuEdOlk7rfWZoF60RdffQcM/YAKPN4MDu');

INSERT INTO message (date_heure, auteur, contenu) VALUES
('2026-04-03 10:00:00', 'Alice', 'Salut tout le monde ! Vous allez bien ?'),
('2026-04-03 10:00:15', 'Bob', 'Salut Alice ! Ça va super et toi ?'),
('2026-04-03 10:00:30', 'Charlie', 'Hello ! Content de vous voir ici.'),
('2026-04-03 10:01:05', 'Alice', 'Je testais juste le nouveau système de chat.'),
('2026-04-03 10:01:20', 'Bob', 'Il a l''air de bien fonctionner. Les bulles sont propres.'),
('2026-04-03 10:02:00', 'Charlie', 'Est-ce que le scroll automatique marche quand il y a beaucoup de texte ?'),
('2026-04-03 10:02:15', 'Alice', 'On va vérifier ça tout de suite en envoyant plusieurs messages.'),
('2026-04-03 10:02:30', 'Alice', 'Voici un message pour prendre de la place.'),
('2026-04-03 10:02:45', 'Alice', 'Encore un autre message pour forcer le scroll !'),
('2026-04-03 10:03:00', 'Bob', 'Moi aussi je participe au remplissage de la base de données.'),
('2026-04-03 10:03:15', 'Charlie', 'Quelqu''un a testé les emojis ? 😊'),
('2026-04-03 10:03:40', 'Bob', 'Oui, ça passe sans problème. 🔥'),
('2026-04-03 10:04:00', 'Alice', 'Charlie, tu as fini ton rapport pour demain ?'),
('2026-04-03 10:04:20', 'Charlie', 'Pas encore, je m''amuse trop sur ce chat haha.'),
('2026-04-03 10:04:45', 'Bob', 'Pareil, c''est plus sympa que de travailler.'),
('2026-04-03 10:05:10', 'Alice', 'Bon, je vais aller manger un morceau. À plus !'),
('2026-04-03 10:05:30', 'Bob', 'Bon appétit Alice !'),
('2026-04-03 10:05:50', 'Charlie', 'À plus tard !'),
('2026-04-03 10:06:15', 'Bob', 'Charlie, on se fait une partie en ligne ce soir ?'),
('2026-04-03 10:06:40', 'Charlie', 'Carrément ! Vers 21h ça te va ?');