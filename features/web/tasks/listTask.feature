Feature: Tasks lists

    Scenario: Test Tasks list
        Given I am logged in as simple user
        And I follow "Consulter la liste des tâches à faire"
        Then I should be on "tasks"

    Scenario: Test completed tasks list
        Given I am logged in as simple user
        And I follow "Consulter la liste des tâches terminées"
        Then I should be on "tasks/completed"