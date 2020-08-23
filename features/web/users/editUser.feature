Feature: User edit page

    Scenario: User edit page Success as an admin
        Given I am logged in as admin
        When I am on "users/1/edit"
        Then I should see "Modifier"
        And I should see an "form" element

    Scenario: User edit page Fail (user log)
        Given I am logged in as simple user
        When I am on "users/1/edit"
        Then the response status code should be 403
        And the response should contain "Access Denied"

    Scenario: User edit page Fail (no connection)
        Given I go to "users/1/edit"
        Then I should be on "login"
    
    Scenario: Fill form Success
        Given I am logged in as admin
        When I am on "users/1/edit"
        And I fill in "Mot de passe" with "test"
        And I fill in "Tapez le mot de passe à nouveau" with "test"
        And I fill in "Adresse email" with "test@gmail.com"
        And I press "Modifier"
        Then I should see "Superbe ! L'utilisateur a bien été modifié"
        And I should be on "users/list"
        And I should see "test@gmail.com"

    Scenario: Fill form Fail (existing username)
        Given I am logged in as admin
        When I am on "users/1/edit"
        And I fill in "Nom d'utilisateur" with "User"
        And I fill in "Mot de passe" with "test"
        And I fill in "Tapez le mot de passe à nouveau" with "test"
        And I press "Modifier"
        Then the response status code should be 500

    Scenario: Fill form with nothing
        Given I am logged in as admin
        When I am on "users/1/edit"
        And I press "Modifier"
        Then I should be on "users/1/edit"