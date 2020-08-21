Feature: Homepage

    Scenario: Text homepage
        Given I am on homepage
        Then I should see "Bienvenue sur Todo List"

    Scenario: Homepage as a user
        Given I am logged in as simple user
        When I am on the homepage
        Then I should see "Se déconnecter"
        And I should not see "Voir la liste des utilisateurs"

    Scenario: Homepage as an Admin
        Given I am logged in as admin
        When I am on the homepage
        Then I should see "Se déconnecter"
        And I should see "Voir la liste des utilisateurs"