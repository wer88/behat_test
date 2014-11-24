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
        $captcha = $page->find("xpath","//input[@name='captcha_sid']")->getValue();
        $code = file_get_contents('http://vds-f237.1gb.ru/local/backend/captcha_hack.php?code='.$captcha);

        if (!$code) {

            throw new Exception('Не удалось получить код каптчи');
        }

        $page->fillField('Число с картинки', $code);
    }

    /**
     * @Then я выбираю случайный элемент из списка :arg1
     */
    public function iaVybiraiuSluchainyiEliemientIzSpiska($locator)
    {
        $page = $this->getSession()->getPage();
        $element = $page->findAll('xpath', $locator);
        var_dump(count($element));
        var_dump($page->find('xpath', '//a[text()="Алтай Республика"]')->isVisible());
        while (!($page->find('xpath', '//a[text()="Алтай Республика"]')->isVisible())) {
            
        }
    }

    /**
     * @Given я раскрываю случайный элемент списка :arg1
     */
    public function iaRaskryvaiuSluchainyiEliemientSpiska($locator)
    {
        $page = $this->getSession()->getPage();
        $element = $page->findAll('xpath', $locator);
        $element[rand(0,count($element)-1)]->click();
        sleep(3);
        $element = $page->findAll('xpath', $locator.'/../ul/li/span');

        $element[rand(0,count($element)-1)]->click();
        sleep(3);
        $screenshot = $this->getSession()->getDriver()->getScreenshot();
        file_put_contents('screenshots/test'. date("m-d-y-H-i-s"). '.png', $screenshot);

    }



}
