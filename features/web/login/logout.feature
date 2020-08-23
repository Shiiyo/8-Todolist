Feature: Logout

    Scenario: Logout success
        Given I am logged in as simple user
        When I am on homepage
        And I follow "Se déconnecter"
        Then I should be on homepage
        And I should see "Se connecter"