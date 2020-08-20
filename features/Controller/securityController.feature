Feature: Login

    Scenario: Test Login and Logout
        Given I am on homepage
        And I follow "Se connecter"
        And I should be on "login"
        When I fill in "username" with "Shiyo"
        And I fill in "password" with "admin"
        And I press "Se connecter"
        Then I should be on homepage
        And I follow "Se déconnecter"
        Then I should be on homepage
        And I should see "Se connecter"

    Scenario: Test Login error
        Given I am on homepage
        And I follow "Se connecter"
        Then I should be on "login"
        And I fill in "username" with "Shiyo"
        And I fill in "password" with "error"
        And I press "Se connecter"
        Then I should be on "login"
        And I should see "Invalid credentials"