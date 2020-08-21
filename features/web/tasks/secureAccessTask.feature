Feature: Secure access to task's pages

    Scenario: Test Tasks protection from unconnected user
        Given I am on the homepage
        And I follow "Consulter la liste des tâches à faire"
        Then I should be on "login"