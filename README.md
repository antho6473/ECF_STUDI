# Projet ECF-STUDI site vitrine fictif Garage Parrot.
## URL du site en déployé en ligne:
[Garage Parrot](https://conglutinative-spli.000webhostapp.com).
## Les prérequis:
- PHP 8.0 minimum.
- Un serveur type APACHE.
- MySQL.
- Un SGBD type PhpMyAdmin.
Je recommande l'utilisation du logiciel "XAMPP" sur Windows "LAMP" sur MacOS et "MAMP" sur Linux, logiciel permettant de gérer un serveur local facilement.
## Récupérer le dossier du projet.
### Avec git ( vous devez avoir git d'installé sur votre machine ).
- Lancez votre Terminal.
- Allez dans votre dossier de projets.
- Exécutez la commande suivante:
`git clone https://github.com/antho6473/ECF_STUDI.git`
### Sans git.
- Allez sur mon [projet git](https://github.com/antho6473/ECF_STUDI).
- CLiquez sur "Code" et sur "Download zip" ou "Télécharger Zip".
- Décompressez le dossier dans le répertoire de vos projets.
## Déployer localement le site.
- Lancez votre serveur ainsi que MYSQL.
- Allez sur votre SGBD et cliquez sur "Importer", cherchez le répertoire du projet, allez dans le dossier "database" et séléctionnez "database.sql".
- Allez ensuite dans ce même dossier et ouvrez le fichier "connDb.php" dans votre éditeur de texte.
- Changez $username et $password celon vote configuration de sgbd, $servername ne change généralement pas.
- Enregistrez le fichier (CTRL + S) et fermez le.
- Désormais allez dans le dossier "functions" présent à la racine du projet et ouvrez le fichier "hashPassword.php".
- Modifiez les valeurs $user et $pass qui seront vos identifiants d'admin de connexion au site.
