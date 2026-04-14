# Utilisation d'une image PHP CLI
FROM php:8.4-cli

# Installation de l'extension PDO MySQL
RUN docker-php-ext-install pdo_mysql

# Définition du répertoire de travail
WORKDIR /usr/src/myapp

# Copie explicite des dossiers et fichiers
COPY public/ /usr/src/myapp/public/
COPY sql/ /usr/src/myapp/sql/
COPY config.php DBConnection.php /usr/src/myapp/

# Exposition du port
EXPOSE 8000

# Lancement du serveur avec un chemin absolu vers le répertoire document
ENTRYPOINT ["php", "-S", "0.0.0.0:8000", "-t", "/usr/src/myapp/public"]
