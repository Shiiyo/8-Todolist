# Audit de qualité

## Etat initial de l'application

### 1. Qualité du code
Rapport Code Climate
![Alt text](./img/CodeClimateAvant.png "Code Climate report")
On peut voir quelques problèmes de duplication ou de code mal écrit mais rien de très loin a améliorer.
<br/>
Rapport Codacy

![Alt text](./img/CodacyAvant.png "Codacy report")
![Alt text](./img/CodacyIssuesBefore.png "Codacy report")
Sur Codacy on peut voir des problèmes de sécurité. Ce n'est pas surprenant car l'application est encore sous Symfony 3.1. C'est pourquoi j'ai mis à jour Symfony vers la version stable actuel 4.4.
On voit aussi quelques soucis de syntaxe de code, mais rien de bien préoccupant.

## Améliorations réalisés
### Upgrade vers Symfony 4.4 (version stable)
Pour commencer, j'ai mis à jour Symfony pour le passer de la version 3.1 à la dernière version stable: la 4.4. J'ai du modifier beaucoup de fichiers de configuration, et de bundles dépréciés. J'ai également refait toute l'architecture de fichiers afin qu'il corresponde à l'architecture de la version 4.4.
<br/>Arborescence initial sous 3.1 :

![Alt text](./img/Arborescence-initial.png "Arborescence initial")

Arborescence après passage à la 4.4:

![Alt text](./img/Arborescence-4-4.png "Arborescence après mise à jour")

On peut voir en particulier que le dossier app disparait sous la version 4.4 et le dossier config fait son apparition pour centraliser toutes les configurations de l'application. L'application est ainsi plus sûre car elle est à jour.

### Expérience utilisateur

## Etat de l'application après amélioration
### 1. Qualité du code
Rapport Code Climate
![Alt text](./img/CodeClimateApres.png "Code Climate report")
![Alt text](./img/CodacyApres.png "Codacy report")
![Alt text](./img/CodacyIssuesAfter.png "Codacy report")
On peut voir qu'après le mise à jour vers Symfony 4.4 et quelques modifications mineurs du code, nous arrivons à avoir des badges A sur les deux sites avec très peu de problèmes de syntaxe restant. Ce sont de très bon résultat qui affirme une bonne qualité de code.

## Tests de l'application
### Tests unitaire avec PHP Unit
![Alt text](./img/PhpUnit.png "Php Unit")
J'ai utilisé l'outil PHP Unit pour réaliser mes tests unitaires. Les tests unitaires servent à exécuter une méthode dont on maîtrise les points d'entrées et de vérfier que la sortie fonctionne correctement. C'est ce qu'on appelle des tests "boites blanches". J'ai ainsi testé les getters et setters des entités de l'application.

### Tests fonctionnels avec Behat
Pour les tests fonctionnels j'ai utilisé l'outil Behat:
![Alt text](./img/Behat.png "Behat")
Les tests fonctionnels, pour leur part, teste les pages, les formulaires, le click d'un lien comme si un utilisateur le faisais à la main sur notre site. C'est ce qu'on appelle des tests "boites noires" car on n'a pas besoin de connaître le détail du code. J'utilise ces tests sur tout le reste de l'application car nous sommes ici sur une application de site web.

### Blackfire
J'ai effectué une analyse avec Blackfire à la réception de l'application puis après les mises à jour et modification effectué.
![Alt text](./img/Blakfire-BeforeUpdate.png)
![Alt text](./img/Blakfire-AfterUpdate.png)
Les performances n'ont pas beaucoup évolué, le site s'est un peu alourdis par le passage à Symfony 4.4 mais il a gagné en sécurité ce qui n'est pas négligeable. Il reste performant car il se charge en moins de 3 sec.

### Conclusion des tests
On peut voir que la couverture de code de minimum 70% est ici respecté. Les tests couvre une partie majoritaire de l'application et vont permettre de savoir rapidement si un problème se déclare et ou précisement pour le débuger rapidement. Il est important dans l'avenir de faire du Test Driven Developpement afin de péréniser l'utilité des tests et leur couverture sur les futurs améliorations de l'application. Les tests Blackfire permettent de voir une continuité de performance malgré l'ajout de fonctionnalités et pourront servir de référence pour l'avenir du développement du site.

## Idées d'améliorations futures
### Cache
La mis en place d'un cache permettrais d'augmenter considérablement la vitesse d'affichage lors de l'actualisation d'une page. Il est possible de créer un cache valide dans un certain laps de temps donnée, c'est ce qu'on appelle le cache d'expiration. Il existe également un cache qui se met à jour si les données demandées ont changés, aussi appelé cache de validation. Les deux caches peuvent être implémenté car ils peuvent se compléter au besoin.

### CSS
Toujours dans l'optique d'amélioré les performances de l'application il pourrais être intéressant de nettoyer le CSS. On pourrais le réécrire sans utiliser Bootstrap car il est très lourd à charger et l'application n'utilise que très peu de ses fonctionnalités.

### Responsive
L'affichage responsive n'est pas optimal et la navigation n'est pas très aisé actuellement en mode téléphone ou tablettte. Pour une expérience utilisateur plus agréable il serais intéressant d'améliorer cet aspect de l'application car beaucoup d'utilisateur n'ont pas d'ordinateur mais des tablettes et téléphones pour naviguer sur Internet.