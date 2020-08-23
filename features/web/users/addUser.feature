Feature: Add User

    Scenario: Access add user page(log as admin)
        Given I am on "users/create"
        Then I should see "Créer un utilisateur"
        And I should see an "form" element

    Scenario: Fill form success
        Given I am logged in as admin
        When I am on "users/create"
        And I fill in "Nom d'utilisateur" with "TestUser"
        And I fill in "Mot de passe" with "test"
        And I fill in "Tapez le mot de passe à nouveau" with "test"
        And I fill in "Adresse email" with "test@gmail.com"
        And I additionally select "Administrateur" from "Role"
        And I press "Ajouter"
        Then I should see "Superbe ! L'utilisateur a bien été ajouté."
        And I should be on "users/list"
        And I should see "TestUser"

    Scenario: Fill form fail with existing username
        Given I am on "users/create"
        And I fill in "Nom d'utilisateur" with "Shiyo"
        And I fill in "Mot de passe" with "test"
        And I fill in "Tapez le mot de passe à nouveau" with "test"
        And I fill in "Adresse email" with "test@gmail.com"
        And I additionally select "Administrateur" from "Role"
        And I press "Ajouter"
        Then the response status code should be 500


    Scenario: Fill form with nothing
        Given I am on "users/create"
        And I press "Ajouter"
        Then I should be on "users/create"