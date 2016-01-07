<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Glossary;

use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Client\Glossary\GlossaryClientInterface;

class GlossaryFactory extends AbstractFactory
{

    /**
     * @param GlossaryClientInterface $glossaryClient
     * @param string $localeName
     *
     * @return TwigTranslator
     */
    public function createTwigTranslator(GlossaryClientInterface $glossaryClient, $localeName)
    {
        return new TwigTranslator($glossaryClient, $localeName);
    }

}
