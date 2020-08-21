Feature: Edit a task

    Background:
        Given I am logged in as simple user
        And I am on "/tasks/1/edit"

    Scenario: Edit success
        When I fill in "Title" with "Test d'édition"
        And I fill in "Content" with "Test de contenu d'édition"
        And I press "Modifier"
        Then I should be on "/tasks"
        And I should see "Superbe ! La tâche a bien été modifiée. "
        And I should see "Test d'édition"
        And I should see "Test de contenu d'édition"

    Scenario: : Edit fail
        When I fill in "Title" with ""
        And I fill in "Content" with ""
        And I press "Modifier"
        Then I should be on "/tasks/1/edit"