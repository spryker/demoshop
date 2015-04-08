<?php

namespace Pyz\Zed\Glossary\Communication;

use Pyz\Zed\Glossary\Business\GlossaryFacade;
use SprykerFeature\Zed\Glossary\Communication\GlossaryDependencyContainer as SprykerGlossaryDependencyContainer;

class GlossaryDependencyContainer extends SprykerGlossaryDependencyContainer
{

    /**
     * @return GlossaryFacade
     */
    public function getInstallerFacade()
    {
        return $this->getLocator()->glossary()->facade();
    }
}
