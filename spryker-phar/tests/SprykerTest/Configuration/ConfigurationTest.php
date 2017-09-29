<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerTest\Configuration;

use Codeception\Test\Unit;
use Spryker\Configuration\Configuration;
use Spryker\Configuration\Exception\StageExistsException;
use Spryker\Configuration\Stage\Stage;

/**
 * Auto-generated group annotations
 * @group SprykerTest
 * @group Configuration
 * @group ConfigurationTest
 * Add your own group annotations below this line
 */
class ConfigurationTest extends Unit
{

    /**
     * @return void
     */
    public function testAddStageToConfiguration()
    {
        $configuration = new Configuration();
        $configuration->addStage(new Stage('development'));

        $this->assertCount(1, $configuration->getStages());
    }

    /**
     * @return void
     */
    public function testAddStagesToConfiguration()
    {
        $configuration = new Configuration();
        $configuration
            ->addStage(new Stage('development'))
            ->addStage(new Stage('staging'));

        $this->assertCount(2, $configuration->getStages());
    }

    /**
     * @return void
     */
    public function testAddStagesWithSameNameShouldThrowAnException()
    {
        $this->expectException(StageExistsException::class);

        $configuration = new Configuration();
        $configuration
            ->addStage(new Stage('development'))
            ->addStage(new Stage('development'));
    }

}
