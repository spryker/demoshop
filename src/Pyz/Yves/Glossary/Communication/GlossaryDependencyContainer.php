<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Glossary\Communication;

use Generated\Yves\Ide\FactoryAutoCompletion\GlossaryCommunication;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use SprykerFeature\Client\Glossary\Service\GlossaryClientInterface;

/**
 * @method GlossaryCommunication getFactory()
 */
class GlossaryDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @param GlossaryClientInterface $glossaryClient
     * @param string $localeName
     *
     * @return TwigTranslator
     */
    public function createTwigTranslator(GlossaryClientInterface $glossaryClient, $localeName)
    {
        return $this->getFactory()->createTwigTranslator($glossaryClient, $localeName);
    }

}
