Feature: Delete a task

    Background:
        Given I am logged in as simple user
        When I am on "tasks"

    Scenario: Delete success
        And I press "Supprimer"
        Then I should be on "tasks"
        And I should see "Superbe ! La tâche a bien été supprimée."

    Scenario: Delete fail
        And I am on "tasks/1/delete"
        Then the response status code should be 500