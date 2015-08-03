<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Glossary\Communication;

use SprykerFeature\Client\Glossary\Service\GlossaryClientInterface;
use Symfony\Component\Translation\TranslatorInterface;

class TwigTranslator implements TranslatorInterface
{

    /**
     * @var GlossaryClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $localeName;

    /**
     * @param GlossaryClientInterface $client
     * @param null|string $localeName
     */
    public function __construct(GlossaryClientInterface $client, $localeName = null)
    {
        $this->client = $client;
        $this->localeName = $localeName;
    }

    /**
     * Translates the given message.
     *
     * @param string $id The message id (may also be an object that can be cast to string)
     * @param array $parameters An array of parameters for the message
     * @param string|null $domain The domain for the message or null to use the default
     * @param string|null $locale The locale or null to use the default
     *
     * @throws \InvalidArgumentException If the locale contains invalid characters
     *
     * @return string The translated string
     *
     * @api
     */
    public function trans($id, array $parameters = [], $domain = null, $locale = null)
    {
        if (is_null($locale)) {
            $locale = $this->localeName;
        }

        return $this->client->translate($id, $parameters, $locale);
    }

    /**
     * Translates the given choice message by choosing a translation according to a number.
     *
     * @param string $id The message id (may also be an object that can be cast to string)
     * @param int $number The number to use to find the indice of the message
     * @param array $parameters An array of parameters for the message
     * @param string|null $domain The domain for the message or null to use the default
     * @param string|null $locale The locale or null to use the default
     *
     * @throws \InvalidArgumentException If the locale contains invalid characters
     *
     * @return string The translated string
     *
     * @api
     */
    public function transChoice($id, $number, array $parameters = [], $domain = null, $locale = null)
    {
        // TODO: Implement transChoice() method.
    }

    /**
     * @param string $localeName
     *
     * @return $this
     */
    public function setLocale($localeName)
    {
        $this->localeName = $localeName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->localeName;
    }

}
