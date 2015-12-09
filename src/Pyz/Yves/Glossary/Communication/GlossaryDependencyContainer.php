<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Glossary\Communication;

use SprykerFeature\Zed\Glossary\Communication\Form\TranslationForm;
use SprykerFeature\Zed\Glossary\Communication\Table\TranslationTable;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use SprykerFeature\Client\Glossary\Service\GlossaryClientInterface;

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
        return new TwigTranslator($glossaryClient, $localeName);
    }

    /**
     * @param array $locales
     *
     * @return TranslationTable
     */
    public function createTranslationTable(array $locales)
    {
        $translationQuery = $this->getQueryContainer()
                    ->queryTranslations();

        $subQuery = $this->getQueryContainer()
                    ->queryTranslations();

        return new TranslationTable($translationQuery, $subQuery, $locales);
    }

    /**
     * @param array $locales
     * @param string $type
     *
     * @return TranslationForm
     */
    public function createTranslationForm(array $locales, $type)
    {
        $translationQuery = $this->getQueryContainer()
                    ->queryTranslations();

        $glossaryKeyQuery = $this->getQueryContainer()
                    ->queryKeys();

        return new TranslationForm($translationQuery, $glossaryKeyQuery, $locales, $type);
    }

}
