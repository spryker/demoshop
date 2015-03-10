<?php
namespace Pyz\Zed\Glossary\Business;

use ProjectA\Zed\Glossary\Business\GlossarySettings as CoreGlossarySettings;

class GlossarySettings extends CoreGlossarySettings
{
    /**
     * @var \Generated\Zed\Ide\AutoCompletion
     */
    protected $locator;

    public function __construct($locator)
    {
        $this->locator = $locator;
    }
}
