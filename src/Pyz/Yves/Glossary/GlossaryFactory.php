<?php

namespace Pyz\Yves\Glossary;

use Spryker\Client\Glossary\GlossaryClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class GlossaryFactory extends AbstractFactory
{

    /**
     * @param \Spryker\Client\Glossary\GlossaryClientInterface $glossaryClient
     * @param string $localeName
     *
     * @return \Pyz\Yves\Glossary\TwigTranslator
     */
    public function createTwigTranslator(GlossaryClientInterface $glossaryClient, $localeName)
    {
        return new TwigTranslator($glossaryClient, $localeName);
    }

}
