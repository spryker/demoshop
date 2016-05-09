<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Glossary;

use Spryker\Client\Glossary\GlossaryClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;
use Symfony\Component\HttpFoundation\RequestStack;

class GlossaryFactory extends AbstractFactory
{

    /**
     * @param \Spryker\Client\Glossary\GlossaryClientInterface $glossaryClient
     * @param \Symfony\Component\HttpFoundation\RequestStack $requestStack
     * @param string $localeName
     *
     * @return \Pyz\Yves\Glossary\TwigTranslator
     */
    public function createTwigTranslator(GlossaryClientInterface $glossaryClient, RequestStack $requestStack, $localeName)
    {
        return new TwigTranslator($glossaryClient, $requestStack, $localeName);
    }

}
