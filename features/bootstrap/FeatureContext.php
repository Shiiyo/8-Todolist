  
<?php

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
    /**
     *  @Given I am logged in as admin
     */
    public function iAmAuthenticatedAsAdmin()
    {
        $this->visit('/login');
        $this->fillField('username', "Shiyo");
        $this->fillField('password', "admin");
        $this->pressButton('Se connecter');
    }

    /**
     * @Given I am logged in as simple user
     */
    public function iAmAuthenticatedAsUser()
    {
        $this->visit('/login');
        $this->fillField('username', "User");
        $this->fillField('password', "admin");
        $this->pressButton('Se connecter');
    }
}
