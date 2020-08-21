Feature: Login

    Scenario: Login success
        Given I am on homepage
        And I follow "Se connecter"
        And I should be on "login"
        When I fill in "username" with "Shiyo"
        And I fill in "password" with "admin"
        And I press "Se connecter"
        Then I should be on homepage

    Scenario: Login fail
        Given I am on homepage
        And I follow "Se connecter"
        Then I should be on "login"
        And I fill in "username" with "Shiyo"
        And I fill in "password" with "error"
        And I press "Se connecter"
        Then I should be on "login"
        And I should see "Invalid credentials"

    Scenario: Show login page
        Given I am on "login"
        Then I should see an "form" element