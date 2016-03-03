<?php

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Glossary;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Glossary\Persistence\SpyGlossaryKeyQuery;
use Pyz\Zed\Glossary\Business\GlossaryFacadeInterface;
use Pyz\Zed\Installer\Business\Icecat\Importer\AbstractIcecatImporter;
use Symfony\Component\Console\Output\OutputInterface;

class TranslationImporter extends AbstractIcecatImporter
{

    /**
     * @var \Pyz\Zed\Glossary\Business\GlossaryFacadeInterface
     */
    protected $glossaryFacade;

    /**
     * @param \Pyz\Zed\Glossary\Business\GlossaryFacadeInterface $glossaryFacade
     */
    public function setGlossaryFacade(GlossaryFacadeInterface $glossaryFacade)
    {
        $this->glossaryFacade = $glossaryFacade;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Translation';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyGlossaryKeyQuery::create();
        return $query->count() > 0;
    }

    /**
     * @param array $data
     */
    public function importOne(array $data)
    {
        foreach ($data as $translationKey => $translationData) {
            if (!$this->glossaryFacade->hasKey($translationKey)) {
                $this->glossaryFacade->createKey($translationKey);
            }

            foreach ($translationData as $localeName => $translationText) {
                $localeTransfer = new LocaleTransfer();
                $localeTransfer->setLocaleName($localeName);

                if (!$this->glossaryFacade->hasTranslation($translationKey, $localeTransfer)) {
                    $this->glossaryFacade->createAndTouchTranslation($translationKey, $localeTransfer, $translationText, true);
                }
            }
        }
    }

}
