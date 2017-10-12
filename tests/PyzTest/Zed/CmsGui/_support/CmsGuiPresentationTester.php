<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\CmsGui;

use Codeception\Actor;
use Codeception\Scenario;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 */
class CmsGuiPresentationTester extends Actor
{
    use _generated\CmsGuiPresentationTesterActions;

    /**
     * @param \Codeception\Scenario $scenario
     */
    public function __construct(Scenario $scenario)
    {
        parent::__construct($scenario);

        $this->amZed();
        $this->amLoggedInUser();
    }

    /**
     * @param string $date
     *
     * @return $this
     */
    public function setValidFrom($date)
    {
        $this->fillField("//*[@id=\"cms_page_validFrom\"]", $date);

        return $this;
    }

    /**
     * @return $this
     */
    public function setIsSearchable()
    {
        $this->checkOption('//*[@id="cms_page_isSearchable"]');

        return $this;
    }

    /**
     * @param string $date
     *
     * @return $this
     */
    public function setValidTo($date)
    {
        $this->fillField("//*[@id=\"cms_page_validTo\"]", $date);

        return $this;
    }

    /**
     * @param int $formIndex
     * @param string $name
     * @param string $url
     *
     * @return $this
     */
    public function fillLocalizedUrlForm($formIndex, $name, $url)
    {
        $this->fillField('//*[@id="cms_page_pageAttributes_' . $formIndex . '_name"]', $name);
        $this->fillField('//*[@id="cms_page_pageAttributes_' . $formIndex . '_url"]', $url);

        return $this;
    }

    /**
     * @param int $placeHolderIndex
     * @param int $localeIndex
     * @param string $contents
     *
     * @return void
     */
    public function fillPlaceholderContents($placeHolderIndex, $localeIndex, $contents)
    {
        $translationElementId = 'cms_glossary_glossaryAttributes_' . $placeHolderIndex . '_translations_' . $localeIndex . '_translation';

        $this->executeJS("$('#$translationElementId').text('$contents');");
    }

    /**
     * @return $this
     */
    public function expandLocalizedUrlPane()
    {
        $this->click('//*[@id="tab-content-general"]/div/div[6]/div[1]/a');

        return $this;
    }

    /**
     * @return $this
     */
    public function clickSubmit()
    {
        $this->click('//*[@id="submit-cms"]');

        return $this;
    }

    /**
     * @return $this
     */
    public function clickPublishButton()
    {
        $this->click('//*[@id="page-wrapper"]/div[2]/div[2]/div/a[1]');

        return $this;
    }

    /**
     * @return $this
     */
    public function includeJquery()
    {
        $this->executeJS(
            '
             var jq = document.createElement("script");
             jq.src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js";
             document.getElementsByTagName("head")[0].appendChild(jq);
            '
        );

        $this->wait(1);

        return $this;
    }

    /**
     * @return int
     */
    public function grabCmsPageId()
    {
        return $this->grabFromCurrentUrl('/id-cms-page=(\d+)/');
    }
}
