<?php

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;


/**
 * classe FeatureContext to run fonctïonnel test
 */
class FeatureContext extends MinkContext
{

    /**
     *   driver PHP pour selenium
     * */

    protected $driver;
    /**
     * URL du serveur selenium
     */
    protected $serverUrl = 'http://localhost:4444';
    /**
     * Constructor.
     *
     *
     */
    public function __construct()
    {
        $desiredCapabilities = DesiredCapabilities::firefox();

        // Disable accepting SSL certificates
        $desiredCapabilities->setCapability('acceptSslCerts', false);
        $this->driver = RemoteWebDriver::create($this->serverUrl, $desiredCapabilities);

    }

    /**
     * @Given I am on the authentification page
     */
    public function iAmOnTheAuthentificationPage()
    {
        $this->driver->get('http://127.0.0.1/test6MVC');
    }

    /**
     * @Given /I authenticated as "(?P<username>[^"]*)" using "(?P<password>[^"]*)"/
     */
    public function iAuthenticatedWithUsernameAndPassword($username, $password)
    {
        $this->driver->findElement(WebDriverBy::id('login'))
            ->sendKeys($username);
        $this->driver->findElement(WebDriverBy::id('password-input'))
            ->sendKeys($password);

    }

    /**
     * @When I submit the form
     */
    public function iSubmitTheForm()
    {

        $this->driver->findElement(WebDriverBy::id('valider'))
            ->submit();
    }

    /**
     * @Then I should see Accueil
     */
    public function iShouldSeeAccueil()
    {
        //wait to load the web page
        $this->driver->wait(10, 1000)->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::linktext("Ajax")));

        // Find link Les tests unitaires (PHPUNIT) element of 'Accueil' page
        $this->driver->findElement(
            WebDriverBy::linkText("Les tests unitaires (PHPUNIT)")
        );

        // Make sure to always call quit() at the end to terminate the browser session
       // $this->driver->quit();
    }
     /**
     * @Given I am on the ajoutLivre page
     */
    public function iAmOnTheAjoutLivrePage()
    {
        //wait to load the web page
        $this->driver->wait(10, 1000)->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::linktext("Ajax")));

        $this->driver->findElement(WebDriverBy::xpath("//html/body/div[1]/nav/ul/li[2]/a"))->click();
    }

    /**
     * @Given /I put Nom as "(?P<nom>[^"]*)"/
     */
    public function iPutNomPage($nom)
    {
        $this->driver->findElement(WebDriverBy::id('nom'))
        ->sendKeys($nom);
    }
     /**
     * @Given /I put Auteur as "(?P<auteur>[^"]*)"/
     */
    public function iPutAuteurPage($auteur)
    {
        $this->driver->findElement(WebDriverBy::id('auteur'))
        ->sendKeys($auteur);
    }
    /**
     * @Given /I put Edition as "(?P<edition>[^"]*)"/
     */
    public function iPutEditionPage($edition)
    {
        $this->driver->findElement(WebDriverBy::id('edition'))
        ->sendKeys($edition);
    }
    /**
     * @Given /I put Information as "(?P<information>[^"]*)"/
     */
    public function iPutInformationPage($information)
    {
        $this->driver->findElement(WebDriverBy::id('info'))
        ->sendKeys($information);
    }
     /**
     * @When I submit the form ajoutLivre
     */
    public function iSubmitTheFormAjoutLivre()
    {

        $this->driver->findElement(WebDriverBy::id('ajouter'))
            ->submit();
    }
    /**
     * @Then I should see AjoutLivre
     */
    public function iShouldSeeAjoutLivre()
    {
        //wait to load the web page
       // $this->driver->wait(10, 1000)->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::linktext("Ajax")));

        



      $res= $this->driver->findElement(WebDriverBy::xpath("//html/body/div[1]/div/div/div[2]/p"))->getText();
      echo "res=".$res;
      if($res!="Le livre Les miserables de Victor Hugo est inséré en BDD !"){
            throw new Exception();
      }
  
        $this->driver->quit();
    }
}
