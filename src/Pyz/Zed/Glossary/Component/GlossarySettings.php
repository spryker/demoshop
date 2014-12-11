<?php

namespace Pyz\Zed\Glossary\Component;

use ProjectA\Zed\Glossary\Component\GlossarySettings as ProjectAGlossarySettings;

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
