<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\Catalog\Price;

use Spryker\Client\Currency\CurrencyClientInterface;
use Spryker\Client\Price\PriceClientInterface;
use Spryker\Client\PriceProduct\PriceProductClientInterface;

class PriceIdentifierBuilder implements PriceIdentifierBuilderInterface
{
    /**
     * @var \Spryker\Client\Currency\CurrencyClientInterface
     */
    protected $currencyClient;

    /**
     * @var \Spryker\Client\Price\PriceClientInterface
     */
    protected $priceClient;

    /**
     * @var \Spryker\Client\PriceProduct\PriceProductClientInterface
     */
    protected $priceProductClient;

    /**
     * @param \Spryker\Client\Currency\CurrencyClientInterface $currencyClient
     * @param \Spryker\Client\Price\PriceClientInterface $priceClient
     * @param \Spryker\Client\PriceProduct\PriceProductClientInterface $priceProductClient
     */
    public function __construct(
        CurrencyClientInterface $currencyClient,
        PriceClientInterface $priceClient,
        PriceProductClientInterface $priceProductClient
    )
    {
        $this->currencyClient = $currencyClient;
        $this->priceClient = $priceClient;
        $this->priceProductClient = $priceProductClient;
    }

    /**
     * @return string
     */
    public function buildIdentifier()
    {
        $priceType = $this->priceProductClient->getPriceTypeDefaultName();
        $currencyIsoCode = $this->currencyClient->getCurrent()->getCode();
        $priceMode = $this->priceClient->getCurrentPriceMode();

        return sprintf('price-%s-%s-%s', $priceType, $currencyIsoCode, $priceMode);
    }
}
