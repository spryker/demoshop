<?php

namespace Pyz\Zed\Glossary\Business;

use SprykerFeature\Zed\Glossary\Business\Key\KeyManagerInterface;
use SprykerFeature\Zed\Glossary\Business\Translation\TranslationManagerInterface;
use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Locale\Business\LocaleFacade;

class Importer
{
    /**
     * @var ResourceReaderInterface
     */
    protected $resourceReader;

    /**
     * @var KeyManagerInterface
     */
    protected $keyManager;

    /**
     * @var TranslationManagerInterface
     */
    protected $translationManager;

    /**
     * @var LocaleFacade
     */
    protected $localeFacade;

    /**
     * @var LocaleTransfer[]
     */
    protected $localeTransfers = [];

    /**
     * @param ResourceReaderInterface $resourceReader
     * @param $keyManager
     * @param $translationManager
     * @param $localeFacade
     */
    public function __construct(
        ResourceReaderInterface $resourceReader,
        KeyManagerInterface $keyManager,
        TranslationManagerInterface $translationManager,
        LocaleFacade $localeFacade
    ) {
        $this->resourceReader = $resourceReader;
        $this->keyManager = $keyManager;
        $this->translationManager = $translationManager;
        $this->localeFacade = $localeFacade;
    }

    /**
     * @return array
     */
    public function import()
    {
        $messages = ['error' => [], 'info'=> []];

        $csv = $this->resourceReader->getContent();

        $header = $csv[0];

        foreach ($csv as $rowNumber => $row) {
            if ($rowNumber === 0) {
                continue;
            }

            $key = $row[0];

            if ($this->keyIsValid($key) === false) {
                $messages['info'][] = sprintf('Row #%s has no valid key.', $rowNumber+1);
                continue;
            }

            foreach($row as $columnNumber => $column) {
                if ($columnNumber === 0) {
                    continue;
                }

                $error = $this->updateTranslation($key, $column, $header[$columnNumber]);
                if ($error !== null) {
                    $messages['error'][] = $error;
                }
            }
        }

        $messages['success'][] = sprintf('Imported translations from "%s"', $this->resourceReader->getSource());

        return $messages;
    }

    /**
     * @param string $key
     * @return bool
     */
    protected function keyIsValid($key)
    {
        if (empty($key) === true) {
            return false;
        }

        $this->ensureKeyExists($key);

        return true;
    }

    /**
     * @param string $key
     */
    protected function ensureKeyExists($key)
    {
        if ($this->keyManager->hasKey($key) === false) {
            $this->keyManager->createKey($key);
        }
    }

    /**
     * @param string $key
     * @param string $column
     * @param string $localeName
     * @return null|string
     */
    protected function updateTranslation($key, $column, $localeName)
    {
        $localeTransfer = $this->getLocaleTransfer($localeName);

        if (empty($column) === true) {
            $error = sprintf('Key %s has no valid value for locale %s .', $key, $localeName);
            return $error;
        }

        if ($this->translationManager->hasTranslation($key, $localeTransfer)) {
            $this->translationManager->updateAndTouchTranslation($key, $localeTransfer, $column);
        } else {
            $this->translationManager->createAndTouchTranslation($key, $localeTransfer, $column);
        }

        return null;
    }

    /**
     * @param string $localeName
     * @return LocaleTransfer
     */
    protected function getLocaleTransfer($localeName)
    {
        if (isset($this->localeTransfers[$localeName])) {
            return $this->localeTransfers[$localeName];
        }

        $localeTransfer = $this->localeFacade->getLocale($localeName);
        $this->localeTransfers[$localeName] = $localeTransfer;

        return $localeTransfer;
    }
}
