<?php

namespace Pyz\Zed\Glossary;

use SprykerFeature\Zed\Glossary\GlossaryConfig as SprykerGlossaryConfig;
use Pyz\Shared\Glossary\GlossaryConfig as SharedGlossaryConfig;

class GlossaryConfig extends SprykerGlossaryConfig
{
    /**
     * @return string
     */
    public function getRemoteCSVUrl()
    {
        return $this->get(SharedGlossaryConfig::REMOTE_CSV_URL);
    }
}
