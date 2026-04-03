# 💬 Mini-Chat-Ajax

> 🚧 **Projet en cours de développement**

## 🛠️ Présentation
**Mini-Chat-Ajax** est une application de messagerie instantanée légère. Elle permet aux utilisateurs de créer un compte, de se connecter et d'échanger des messages en temps réel via une interface web, en utilisant les technologies **Ajax** et la librairie **jQuery** pour interagir avec un serveur PHP/MySQL.

## 💻 Stack Technique
- **Frontend** : HTML5, CSS3, JavaScript
- **Librairie** : jQuery
- **Backend** : PHP (Testé sur version 8.2)
- **Base de données** : MySQL

## ⚙️ Installation et Configuration

1. **Cloner le projet** :
   ```bash
   git clone https://github.com/leul-mulugeta/mini-chat-ajax.git
   cd mini-chat-ajax
   ```

2. **Base de données** :
   Vous devez disposer d'un serveur MySQL (via **XAMPP**, **WAMP**, ou en ligne de commande).
   - Créez une nouvelle base de données (ex: `mini-chat-ajax`) via `phpMyAdmin` ou en ligne de commande.
   - Importez le fichier `schema.sql` pour créer la structure des tables.

3. **Configuration** :
   - Renommez le fichier `config.sample.php` en `config.php`.
   - Modifiez ce fichier pour configurer vos accès à la base de données (Host, Nom, Utilisateur, Mot de passe).

## 🚀 Exécution

Vous avez deux options pour lancer l'application :

### Option A : Serveur Web (XAMPP / Apache)
- Placez le dossier du projet dans votre répertoire `htdocs` ou `www`.
- Accédez à l'application via `http://localhost/mini-chat-ajax/public/`.

### Option B : Serveur intégré PHP
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
├── DBConnection.php     # Singleton de connexion PDO
├── config.sample.php    # Exemple de configuration
├── schema.sql           # Schéma de la base de données
└── README.md
```

## 🧑‍💻 À propos
Projet réalisé par **Leul Nebeyu MULUGETA** et **Raphael VALIERE**.

## 📄 Licence
Ce projet est sous licence MIT - voir le fichier [LICENSE](LICENSE) pour plus de détails.
