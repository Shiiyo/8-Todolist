Feature: Tasks Management

    Scenario: Test Tasks protection from unconnected user
        Given I am on the homepage
        And I follow "Consulter la liste des tâches à faire"
        Then I should be on "login"

    Scenario: Test Tasks list
        Given I am logged in as simple user
        Then I should be on homepage
        And I follow "Consulter la liste des tâches à faire"
        Then I should be on "tasks"
        
    Scenario: Test completed tasks list
        Given I am logged in as simple user
        Then I should be on homepage
        And I follow "Consulter la liste des tâches terminées"
        Then I should be on "tasks/completed"