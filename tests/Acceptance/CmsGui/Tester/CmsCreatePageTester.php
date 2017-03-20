<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\CmsGui\Tester;

use ZedAcceptanceTester;

class CmsCreatePageTester extends ZedAcceptanceTester
{

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
     * @return $this
     */
    public function expandLocalizedUrlPane()
    {
        $this->click('//*[@id="tab-content-general"]/div/div[5]/div[1]/a');

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
    public function clickActivateButton()
    {
        $this->click('//*[@id="page-wrapper"]/div[2]/div[2]/div/a[1]');

        return $this;
    }

}
