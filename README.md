# ComparAuto

Un site de petites annonces entre particuliers pour véhicules

![Image Présentation](https://github.com/Luc4gbox/ComparAuto/raw/main/CamparAuto1.png)

## Description

Ce projet a été réalisé comme projet de fin de ma deuxième année de licence.
Il est divisé en 2 parties, une partie Symfony et une partie VueJS
L'ensemble de ce projet est conçu pour être utilisé en local.
Vous avez besoin de la partie Symfony pour utiliser la partie VueJS car les données de la partie VueJS sont stockées dans Symfony.
La partie Symfony peut fonctionner sans la partie VueJS, mais certains liens ne marcheront pas.

## Installation

#### Prérequis

Pour héberger ce projet en local, il vous faudra un IDE qui supporte Symfony et une base de données.
Personnellement pour développer ce projet, j'ai utilisé PhpStorm avec MySQL pour la partie Symfony et Visual Studio Code pour la partie VueJS.
La version de PHP utilisée est la 8.1.
Vous aurez également besoin d’un gestionnaire de paquets, tel que npm. 

### Partie Symfony

Lancez l'IDE de votre choix (de préférence phpstorm), liez votre base de données dans votre IDE avec vos identifiants et mot de passe personnel.
Pensez à modifier le fichier ".env" pour modifier l'accès à la base de données.
Il faut que votre IDE supporte le framework Symfony.

Lancer un terminal et créer la database

```
bin/console doctrine:database:create
```

Charger la migration de la database

```
symfony console doctrine:migrations:migrate
```

Charger les fixtures (yes purge database)

```
php bin/console doctrine:fixtures:load
```

Lancer le site en local (vérifier que le site est bien lancé sur l'adresse "http://localhost:8000")

```
symfony server:start
```

### Partie VueJS

Lancer l'IDE de votre choix

Lancer un terminal et installer les dépendances

```
npm install
```

Creer le build

```
npm run build
```

Lancer le serveur (vérifier que le site est bien lancé sur l'adresse "http://localhost:5173")

```
npm run dev
```

## Utilisation

Dans la partie Symfony, vous avez la possibilité de vous créer un compte et de poster des annonces.
Vous pouvez également comparer 2 annonces entre elles.
Si vous le souhaitez, étant donné que le site est destiné à être utilisé uniquement en local, vous pouvez accéder au menu administrateur en utilisant les identifiants et le mot de passe suivants :
* Adresse mail : user@gmail.com
* Mot de passe : user

Cela vous donnera accès à l'interface d'EasyAdmin.

Dans la partie VueJS, vous avez la possibilité d'obtenir des informations sur les principaux constructeurs mondiaux.
Vous avez également la possibilité de répondre à un petit quiz sur l'automobile en général.

## En savoir plus

Pour en savoir plus, n'hésitez pas à lire le PDF fourni ("CompteRendu-Projet-Lucas-Dubois.pdf").
Ce PDF est un compte rendu que j'ai fait pour mes professeurs d'université,
vous trouverez dedans :
* Descriptif du projet
* Outils et méthodologie utilisés.
* Présentation des résultats obtenus sous la forme de captures d’écran
* Une conclusion

[Voir le Fichier PDF](https://github.com/Luc4gbox/ComparAuto/blob/main/CompteRendu-Projet-Lucas-Dubois.pdf)

## Note Personnelle

Ceci est le premier projet que je mets en ligne, et je suis conscient qu'il pourrait y avoir des éléments à améliorer. Je m'excuse par avance si vous rencontrez des problèmes pour lancer ce projet et je suis ouvert à tout retour ou suggestion pour amélioration. N'hésitez pas à ouvrir une issue sur GitHub si vous avez des questions ou des préoccupations. Merci de votre compréhension.