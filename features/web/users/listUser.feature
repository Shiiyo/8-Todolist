Feature: User list page

    Scenario: User list success
        Given I am logged in as admin
        When I am on "users/list"
        Then I should see "Liste des utilisateurs"
        And I should see an "table" element

    Scenario: User list fail (log as a user)
        Given I am logged in as simple user
        When I am on "users/list"
        Then the response status code should be 403
        And the response should contain "Access Denied"

    Scenario: User list fail (no connection)
        Given I am on "users/list"
        Then I should be on "login"