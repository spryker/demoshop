<?php

namespace Pyz\Zed\Glossary\Business;

use ProjectA\Zed\Glossary\Business\GlossarySettings as ProjectAGlossarySettings;

class GlossarySettings extends ProjectAGlossarySettings
{
    /**
     * @return string
     */
    public function getDumpFilePathName()
    {
        return __DIR__ . '/../File/initial_translation.yml';
    }
}
