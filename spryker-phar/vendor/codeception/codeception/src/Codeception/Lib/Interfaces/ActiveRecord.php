<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Interfaces;

interface ActiveRecord extends ORM
{

    public function haveRecord($model, $attributes = []);

    public function seeRecord($model, $attributes = []);

    public function dontSeeRecord($model, $attributes = []);

    public function grabRecord($model, $attributes = []);

}
