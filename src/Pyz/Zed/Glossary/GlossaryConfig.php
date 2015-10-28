<?php

namespace Pyz\Zed\Glossary;

use SprykerFeature\Zed\Glossary\GlossaryConfig as SprykerGlossaryConfig;

class GlossaryConfig extends SprykerGlossaryConfig
{
    /**
     * @return string
     */
    public function getRemoteCSVUrl()
    {
        return 'https://docs.google.com/spreadsheets/d/13InPAj1BWLFrvQX8h6uVIVJi-wNmTmUPd3cJXTfGp5U/pub?gid=0&single=true&output=csv';
    }
}
