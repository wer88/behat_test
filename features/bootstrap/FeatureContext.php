<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
//class FeatureContext implements Context, SnippetAcceptingContext
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }
    
     /**
     * @Given /^(?:|я )кликаю на "([^"]*)"$/
     */
    public function iaAvtorizuiusPodPolZovatieliem($locator)
    {
        $page = $this->getSession()->getPage();

        $element = $page->find('xpath', $locator);
        
        //если ненайден
        if (!$element) {

            throw new Exception('Кнопка "Войти на сайт" не найдена');
        }

        $element->click();
        
    }
}
