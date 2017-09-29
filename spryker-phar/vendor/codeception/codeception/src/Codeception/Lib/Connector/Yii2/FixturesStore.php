<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Connector\Yii2;

use yii\test\FixtureTrait;
use yii\test\InitDbFixture;

class FixturesStore
{

    use FixtureTrait;

    protected $data;

    /**
     * Expects fixtures config
     *
     * FixturesStore constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function fixtures()
    {
        return $this->data;
    }

    public function globalFixtures()
    {
        return [
            InitDbFixture::className()
        ];
    }

}
