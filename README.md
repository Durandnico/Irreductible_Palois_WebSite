# README
## Project : Ing1-IR_Website 
### Table des matières
1. [Pré-requis](#Pré-requis)
2. [Lancer le serveur](#serveur)
3. [Ouvrir le site Web](#exe)
4. [Info utile](#Info)

#### Pré-requis
***
-Nécessite les applications suivantes: php, mysql. Sur Ubuntu voici la commande :
```sh
sudo apt-get update && sudo apt-get install php mysql
```
-Il est nécessaire d'avoir une connection internet pour ouvrir le site web, toutes les fonctionnalités du site ne seront pas dispnible sinon.
##### Charger la BDD
***
-Ouvrir un terminal dans le dossier BDD du projet
-Ouvrir mysql avec un user 'root' sans mdp puis charger les fichier : Irreductible_Palois.sql et Irreductible_Palois_data.sql, voici les commandes à entrer dans le terminal :
```sh
mysql -u root
source Irreductible_Palois.sql
source Irreductible_Palois_data.sql
```
#### Lancer le serveur
***
Dans le même dossier que le README. 
Exécuter la commande suivante dans le terminal
```sh
php -S localhost:8080
```
#### Ouvrir le site Web
***
Pour pour ouvrir le site Web :
ouvrir, dans un navigateur, l'url localhost:8080
ou en ligne de commande :
```sh
firefox localhost:8080
```
#### Info utile
****
-Il y a 2 users
    * login : Paularis  | mdp : Titiouan49.3 (Utilisateur classique)
    * login : admin     | mdp : admin (administrateur)
### Crédits
***
Auteur : DURAND Nicolas Erich Pierre <nicolas.durand@cy-tech.fr>
Github : https://github.com/Durandnico/Irreductible_Palois_WebSite
