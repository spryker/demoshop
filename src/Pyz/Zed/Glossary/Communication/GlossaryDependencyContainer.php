<?php

namespace Pyz\Zed\Glossary\Communication;

use ProjectA\Zed\Glossary\Communication\GlossaryDependencyContainer as SprykerGlossaryDependencyContainer;
use Pyz\Zed\Glossary\Business\GlossaryFacade;

class GlossaryDependencyContainer extends SprykerGlossaryDependencyContainer
{

    /**
     * @return GlossaryFacade
     */
    public function getInstallerFacade()
    {
        return $this->locator->glossary()->facade();
    }
}
