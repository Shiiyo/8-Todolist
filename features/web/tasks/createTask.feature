Feature: Create a task

    Background:
        Given I am logged in as simple user
        And I follow "Créer une nouvelle tâche"
        And I should be on "tasks/create"

    Scenario: Create success
        When I fill in "Title" with "Tâche test"
        And I fill in "Content" with "Test de contenu"
        And I press "Ajouter"
        Then I should be on "tasks"
        And I should see "La tâche a été bien été ajoutée."
        And I should see "Tâche test"

    Scenario: Create fail
        When I fill in "Title" with ""
        And I fill in "Content" with ""
        And I press "Ajouter"
        Then I should be on "tasks/create"