ToDoList
========

Base du projet #8 : Améliorez un projet existant
https://openclassrooms.com/projects/ameliorer-un-projet-existant-1

-------------------------------------------------------------------------------

## Badges
[![Maintainability](https://api.codeclimate.com/v1/badges/8130524edead3861ae00/maintainability)](https://codeclimate.com/github/Shiiyo/8-Todolist/maintainability)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/3506bcde728343e59e26911635b1479e)](https://www.codacy.com/manual/Shiiyo/8-Todolist?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Shiiyo/8-Todolist&amp;utm_campaign=Badge_Grade)

-------------------------------------------------------------------------------

## Install project
### Config your database on the .env file and run
<code>symfony console doctrine:database:create</code><br/>
<code>symfony console doctrine:migrations:migrate</code><br/><br/>
Then run this to generate fake data into the DB:<br/>
<code>symfony console doctrine:fixtures:load</code><br/><br/>
Lunch the server with:<br/>
<code>symfony server:start -d</code>

-------------------------------------------------------------------------------

## Tests
Lunch tests with the following command : </br></br>
I do unit test on controller with PhpUnit : </br>
<code>php bin/phpunit</code> </br>
You can see the code coverage on <code>/web/coverage-phpunit/index.html</code>
</br></br>
And I do functionnal test with Behat : </br>
<code>vendor/bin/behat</code> </br>
You can see the code coverage on <code>/web/coverage-behat/index.html</code></br>

-------------------------------------------------------------------------------

## Documentation

### Diagrams
All the UML diagrams are readable in the folder <code>/docs/diagrams</code></br>

### How to contibute to the project
Read this [document](/docs/Contributing.md)

### How authentification work
Read this [document](/docs/Authentication.md)
