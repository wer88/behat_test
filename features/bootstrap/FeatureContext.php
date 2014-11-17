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
    public function iaKlikaiuNa($locator)
    {
        $page = $this->getSession()->getPage();

        $element = $page->find('xpath', $locator);
        
        //если ненайден
        if (!$element) {

            throw new Exception('Кнопка "Войти на сайт" не найдена');
        }

        $element->click();
        
    }

    /**
     * @Given я ввожу каптчу в поле :locator
     */
    public function iaVvozhuKaptchuVPolie($locator)
    {   
        $page = $this->getSession()->getPage();
        $captcha = $page->find("xpath","//input[@name='sessid']")->getValue();
        $code = file_get_contents('http://vds-f237.1gb.ru/local/backend/captcha_hack.php?code='.$captcha);
        $link = 'http://vds-f237.1gb.ru/local/backend/captcha_hack.php?code='.$captcha;
        echo $link;
        
        echo $code;

        $page->fillField('Число с картинки', $code);
    }

}
