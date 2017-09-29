<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

use Spryker\Configuration\Configuration;
use Spryker\Configuration\ConfigurationFactory;
use Symfony\Component\Console\Style\StyleInterface;

$builder = new ConfigurationFactory();
$developmentStage = $builder->createStage('test', [

    $builder->createSection('cli-section', [
        $builder->createCommand('cli command', 'ls -la'),
    ]),

    $builder->createSection('callback-section', [
        $builder->createCommand('callback command', function (StyleInterface $style) {
            $style->text('I am a callback');
        })
    ]),

]);

return (new Configuration())->addStage($developmentStage);
