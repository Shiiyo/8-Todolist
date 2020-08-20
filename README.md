ToDoList
========

Base du projet #8 : Améliorez un projet existant
https://openclassrooms.com/projects/ameliorer-un-projet-existant-1


## Badges
[![Maintainability](https://api.codeclimate.com/v1/badges/8130524edead3861ae00/maintainability)](https://codeclimate.com/github/Shiiyo/8-Todolist/maintainability)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/3506bcde728343e59e26911635b1479e)](https://www.codacy.com/manual/Shiiyo/8-Todolist?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Shiiyo/8-Todolist&amp;utm_campaign=Badge_Grade)

## Install project
### Config your database on the .env file and run
<code>symfony console doctrine:database:create</code><br/>
<code>symfony console doctrine:migrations:migrate</code><br/><br/>
Then run this to generate fake data into the DB:<br/>
<code>symfony console doctrine:fixtures:load</code><br/><br/>
Lunch the server with:<br/>
<code>symfony server:start -d</code>

## Tests
Lunch unit tests with the command : </br></br>
For PhpUnit : </br>
<code>php bin/phpunit</code> </br>
You can see the coverage on <code>/web/code-coverage/index.html</code>
</br></br>
For Behat : </br>
<code>vendor/bin/behat</code>