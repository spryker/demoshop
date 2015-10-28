<?php

namespace Pyz\Zed\Glossary\Business;

use Guzzle\Http\Client as GuzzleClient;
use League\Csv\Reader;
use SprykerFeature\Zed\Glossary\Business\Key\KeyManagerInterface;
use SprykerFeature\Zed\Glossary\Business\Translation\TranslationManagerInterface;
use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Locale\Business\LocaleFacade;

class RemoteCSV
{
    /**
     * @var string
     */
    protected $url;

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
     * @param string $url
     */
    public function __construct($url, $keyManager, $translationManager, $localeFacade)
    {
        $this->url = $url;
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

        $guzzleClient = new GuzzleClient();
        $response = $guzzleClient->get($this->url)->send();

        if ($response->isError() === true) {
            return ['error' => sprintf('Could not reach "%s"', $this->url)];
        }

        $csvData = $response->getBody(true);
        $csv = Reader::createFromString($csvData)->fetchAll();

        $header = $csv[0];

        foreach ($csv as $rowNumber => $row) {
            if ($rowNumber === 0) {
                continue;
            }
            $key = $row[0];
            if (empty($key) === true) {
                $messages['info'][] = sprintf('Row #%s has no valid key.', $rowNumber+1);
                continue;
            }

            if ($this->keyManager->hasKey($key) === false) {
                $this->keyManager->createKey($key);
            }

            foreach($row as $columnNumber => $column) {
                if ($columnNumber === 0) {
                    continue;
                }

                $localeTransfer = $this->getLocaleTransfer($header[$columnNumber]);

                if (empty($column) === true) {
                    $error = sprintf('Key %s has no valid value for locale %s .', $key, $localeTransfer->getLocaleName());
                    $messages['error'][] = $error;
                    continue;
                }


                if ($this->translationManager->hasTranslation($key, $localeTransfer)) {
                    $this->translationManager->updateAndTouchTranslation($key, $localeTransfer, $column);
                } else {
                    $this->translationManager->createAndTouchTranslation($key, $localeTransfer, $column);
                }
            }
        }

        return $messages;
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
