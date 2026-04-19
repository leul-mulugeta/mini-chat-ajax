# 💬 Mini-Chat-Ajax

## 🛠️ Présentation
**Mini-Chat-Ajax** est une application de messagerie instantanée légère. Elle permet aux utilisateurs de créer un compte, de se connecter et d'échanger des messages en temps réel via une interface web, en utilisant les technologies **Ajax** et la librairie **jQuery** pour interagir avec un serveur PHP/MySQL.

**🌐 [Démo en ligne](https://mini-chat-ajax.alwaysdata.net/)**

**Comptes de test :**
- **Alice** / Alice
- **Bob** / Bob
- **Charlie** / Charlie

## 💻 Stack Technique
- **Frontend** : HTML5, CSS3, JavaScript
- **Librairie** : jQuery
- **Backend** : PHP (Testé sur version 8.2)
- **Base de données** : MySQL

## ⚙️ Installation et Configuration

### 🐳 Via Docker (Recommandé)
**Docker s'occupe de tout** : installation de PHP, de MySQL, configuration des extensions et initialisation de la base de données avec des données de test.
1. Renommez `config.sample.php` en `config.php`.
2. Lancez le projet (voir section **Exécution** ci-dessous).

### 🛠️ Installation Manuelle (Serveur PHP & MySQL indépendant)
Si vous n'utilisez pas Docker, vous devez configurer votre environnement manuellement :
1. **Base de données** :
   - Créez une base de données (ex: `mini-chat-ajax`).
   - Importez `sql/schema.sql` pour créer les tables.
   - *(Optionnel)* Importez `sql/data_test.sql` si vous souhaitez avoir des messages et utilisateurs de test.
2. **Configuration** :
   - Renommez `config.sample.php` en `config.php`.
   - Modifiez `DB_HOST` pour `localhost` et renseignez vos identifiants MySQL locaux.

## 🚀 Exécution

### Option A : Docker Compose
C'est la méthode la plus simple et recommandée. Elle configure automatiquement l'environnement.
- **Lancer / Redémarrer** : `docker compose up --build`
- **Arrêter** : `docker compose down`
- **Réinitialiser (effacer la base de données)** : `docker compose down -v`

> **Note sur les données de test** : Par défaut, Docker injecte `sql/data_test.sql`. Pour l'enlever, supprimez ou commentez la ligne correspondante dans le fichier `compose.yaml` avant de lancer le projet.

Accédez ensuite à l'application via `http://localhost:8000`.

### Option B : Serveur Web (XAMPP / Apache)
- Placez le dossier du projet dans votre répertoire `htdocs` ou `www`.
- Importez le schéma SQL situé dans `sql/schema.sql`.
- Créez votre fichier `config.php` avec vos accès locaux.
- Accédez à l'application via `http://localhost/mini-chat-ajax/public/`.

### Option C : Serveur intégré PHP
- Ouvrez un terminal à la racine du projet.
- Lancez la commande suivante :
  ```bash
  php -S localhost:8000 -t public
  ```
- Accédez à l'adresse `http://localhost:8000` dans votre navigateur.

## 📁 Structure du projet
```
mini-chat-ajax/
├── public/              # Point d'entrée web (accessible publiquement)
│   ├── css/
│   │   └── style.css    # Styles de l'application
│   ├── index.php        # Page principale (Chat)
│   ├── login.php        # Page de connexion
│   ├── register.php     # Page d'inscription
│   ├── logout.php       # Déconnexion
│   ├── enregistrer.php  # Script PHP pour envoyer un message
│   ├── recuperer.php    # Script PHP pour récupérer les messages
│   └── script.js        # Logique JavaScript (Ajax / jQuery)
├── sql/                 # Scripts d'initialisation de la base de données
│   ├── schema.sql       # Structure des tables
│   └── data_test.sql    # Données de test
├── DBConnection.php     # Singleton de connexion PDO
├── config.sample.php    # Exemple de configuration
├── Dockerfile           # Configuration de l'image PHP
├── compose.yaml         # Orchestration des conteneurs
└── README.md
```

## 🧑‍💻 À propos
Projet réalisé par **Leul Nebeyu MULUGETA** et **Raphael VALIERE**.

## 📄 Licence
Ce projet est sous licence MIT - voir le fichier [LICENSE](LICENSE) pour plus de détails.
