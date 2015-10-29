<?php

namespace Pyz\Zed\Glossary;

use SprykerFeature\Zed\Glossary\GlossaryConfig as SprykerGlossaryConfig;

class GlossaryConfig extends SprykerGlossaryConfig
{
    const REMOTE_CSV_URL = 'remove csv url';

    /**
     * @return string
     */
    public function getRemoteCSVUrl()
    {
        return $this->get(self::REMOTE_CSV_URL);
    }
}
