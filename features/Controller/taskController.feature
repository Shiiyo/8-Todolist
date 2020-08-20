Feature: Tasks Management

    Scenario: Test Tasks list
        Given I am on the homepage
        And I follow "Consulter la liste des tâches à faire"
        Then I should be on "tasks"

    Scenario: Test task's creation
        