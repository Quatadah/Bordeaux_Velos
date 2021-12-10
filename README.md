# BORDEAUX VELOS

## Auteurs 

- <em>Quatadah Nasdami</em> <br>
- <em>Doha Sadiq</em><br>
- <em>Ghofrane Hamdouni</em>

# Fonctionnement
## Téléchargement du serveur web Xampp

- Aller vers le lien suivant https://www.apachefriends.org/fr/index.html et suivre les  ́etapes
d’installation.

- Sur le terminal, dans le répertoire où vous l’avez télécharger, exéuter 
    ```bash
        $sudo 
    ```
- Par défaut, sous linux, l'environnement Xampp se télécharge au répértoire /opt/, dans votre terminal, exécuter la commande suivante: 
    ```bash
        $sudo /opt/lampp/lampp start
    ```

Vous avez lancé votre serveur web, il suffit d'y accéder pour y importer votre base de données.


- Aller vers le lien http://localhost/phpmyadmin/


- Selectionner Importer
- Parcourir le fichier creation.sql
- Cliquer sur exécuter
- Après l’éxecution, retourner à la base de données en cliquant sur Base de donnees

- Aller à la base FLOTTE DE VELOS où vous trouverez la base dèja créée
- Importer le fichier <em>miseajour.sql</em> qui contient les procédures stockées nécessaires pour la gestion de notre base
- Pour ajouter les donn ́ees de cette base, vous pouvez importer le fichier peuplement.sql
- Pour revenir vers la base, cliquer sur <em>Structure</em>
- Il est possible de visualiser les données ajoutées en cliquant sur le nom de la table

### Dernière étape
Il faut copier le dossier Application et le déposer dans le serveur web. Pour celà :
- Aller à la page mère du projet puis effectuer la commande 

    ```bash
        $sudo cp -r Application/ /opt/lampp/htdocs
    ```

- Pour accéder à l'interface, rendez vous à l'adresse http://localhost/Application

