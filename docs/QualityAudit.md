# Audit de qualité

## Status Initial de l'application

### 1. Code Climate and Codacy
Rapport Code Climate
![Alt text](./img/CodeClimateAvant.png "Code Climate report")
On peut voir quelques problèmes de duplication ou de code mal écrit mais rien de très loin a améliorer.
<br/>
Rapport Codacy

![Alt text](./img/CodacyAvant.png "Codacy report")
![Alt text](./img/CodacyIssuesBefore.png "Codacy report")
Sur Codacy on peut voir des problèmes de sécurité. Ce n'est pas surprenant car l'application est encore sous Symfony 3.1. C'est pourquoi j'ai mis à jour Symfony vers la version stable actuel 4.4.
On voit aussi quelques soucis de syntaxe de code, mais rien de bien préoccupant. 

## Tests de l'application
### Tests unitaire avec PHP Unit
![Alt text](./img/PhpUnit.png "Php Unit")
J'ai utilisé l'outil PHP Unit pour réaliser mes tests unitaires. Les tests unitaires servent à exécuter une méthode dont on maîtrise les points d'entrées et de vérfier que la sortie fonctionne correctement. C'est ce qu'on appelle des tests "boites blanches". J'ai ainsi testé les getters et setters des entités de l'application.

### Tests fonctionnels avec Behat
Pour les tests fonctionnels j'ai utilisé l'outil Behat:
![Alt text](./img/Behat.png "Behat")
Les tests fonctionnels, pour leur part, teste les pages, les formulaires, le click d'un lien comme si un utilisateur le faisais à la main sur notre site. C'est ce qu'on appelle des tests "boites noires" car on n'a pas besoin de connaître le détail du code. J'utilise ces tests sur tout le reste de l'application car nous sommes ici sur une application de site web.

### Conclusion des tests
On peut voir que la couverture de code de minimum 70% est ici respecté. Les tests couvre une partie majoritaire de l'application et vont permettre de savoir rapidement si un problème se déclare et ou précisement pour le débuger rapidement. Il est important dans l'avenir de faire du Test Driven Developpement afin de péréniser l'utilité des tests et leur couverture sur les futurs améliorations de l'application.
