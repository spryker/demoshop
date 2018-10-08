<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\HelloSpryker\Business\Model\HelloSpryker;

use Orm\Zed\HelloSpryker\Persistence\PyzHelloSpryker;
use Pyz\Zed\HelloSpryker\HelloSprykerConfig;
use Pyz\Zed\HelloSpryker\Persistence\HelloSprykerQueryContainer;
use Pyz\Zed\StringFormat\Business\StringFormatFacadeInterface;

class HelloSpryker
{
    /**
     * @var \Pyz\Zed\HelloSpryker\HelloSprykerConfig
     */
    private $config;

    /**
     * @var \Pyz\Zed\HelloSpryker\Persistence\HelloSprykerQueryContainer
     */
    private $helloSprykerQueryContainer;

    /**
     * @var \Pyz\Zed\StringFormat\Business\StringFormatFacadeInterface
     */
    private $stringFormatFacade;

    /**
     * @param \Pyz\Zed\HelloSpryker\HelloSprykerConfig $config
     * @param \Pyz\Zed\HelloSpryker\Persistence\HelloSprykerQueryContainer $helloSprykerQueryContainer
     * @param \Pyz\Zed\StringFormat\Business\StringFormatFacadeInterface $stringFormatFacade
     */
    public function __construct(
        HelloSprykerConfig $config,
        HelloSprykerQueryContainer $helloSprykerQueryContainer,
        StringFormatFacadeInterface $stringFormatFacade
    ) {
        $this->config = $config;
        $this->helloSprykerQueryContainer = $helloSprykerQueryContainer;
        $this->stringFormatFacade = $stringFormatFacade;

        $this->initDatabaseFromConfig($this->config);
    }

    /**
     * @return string
     */
    public function getReversedString(): string
    {
        $helloSprykerEntity = $this->helloSprykerQueryContainer->queryHelloSpryker()->findOne();

        return $this->stringFormatFacade->getReversedString($helloSprykerEntity->getString());
    }

    /**
     * @param \Pyz\Zed\HelloSpryker\HelloSprykerConfig $helloSprykerConfig
     *
     * @return void
     */
    protected function initDatabaseFromConfig(HelloSprykerConfig $helloSprykerConfig)
    {
        $helloSprykerEntity = $this->helloSprykerQueryContainer->queryHelloSpryker()->findOne();

        if (!$helloSprykerEntity) {
            $helloSprykerEntity = new PyzHelloSpryker();
        }

        $helloSprykerEntity->setString($helloSprykerConfig->getString());
        $helloSprykerEntity->save();
    }
}
