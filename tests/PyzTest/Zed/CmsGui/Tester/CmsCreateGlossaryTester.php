<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace PyzTest\Zed\CmsGui\Tester;

use ZedAcceptanceTester;

class CmsCreateGlossaryTester extends ZedAcceptanceTester
{

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

    /**
     * @return $this
     */
    public function clickSubmit()
    {
        $this->click('//*[@id="submit-cms"]');

        return $this;
    }

}
