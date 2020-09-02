# ToDoList
Base du projet #8 : Améliorez un projet existant
<https://openclassrooms.com/projects/ameliorer-un-projet-existant-1>

--------------------------------------
## Badges
[![Maintainability](https://api.codeclimate.com/v1/badges/8130524edead3861ae00/maintainability)](https://codeclimate.com/github/Shiiyo/8-Todolist/maintainability)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/b7b704ef92ab4597a8f6025c95496e12)](https://www.codacy.com/manual/Shiiyo/8-Todolist?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Shiiyo/8-Todolist&amp;utm_campaign=Badge_Grade)

-------------------------------------------------------------------------------

## Install project
### Clone the project
```shell
git clone https://github.com/Shiiyo/8-Todolist.git
``` 

### Install the bundles
```shell
composer install
``` 
### Config 
Config your database on the .env file and run
```shell
symfony console doctrine:database:create
symfony console doctrine:migrations:migrate
``` 
Then run this to generate fake data into the DB:
```shell
symfony console doctrine:fixtures:load
``` 
Lunch the server with:
```shell
symfony server:start -d
``` 

You can test user's connection with these identifiers:
| Username        | Password    | Role       |
| :-------------- | :---------- | :--------- |
| User            | admin       | ROLE_USER  |
| Shiyo           | admin       | ROLE_ADMIN |

-------------------------------------------------------------------------------

## Tests
Lunch tests with the following command : </br></br>
I do unit test on controller with PhpUnit : </br>
```shell
php bin/phpunit
``` 
You can see the code coverage on <code>/web/coverage-phpunit/index.html</code>
</br></br>
And I do functionnal test with Behat : </br>
```shell
vendor/bin/behat
``` 
You can see the code coverage on <code>/web/coverage-behat/index.html</code></br>

-------------------------------------------------------------------------------

## Documentation

### Diagrams
All the UML diagrams are readable in the folder <code>/docs/diagrams</code></br>

### How to contibute to the project
Read this [document](/docs/Contributing.md)

### How authentification work
Read this [document](/docs/Authentication.md)
