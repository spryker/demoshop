<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Refactor\Console;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Bootstrap extends Application
{

    public function __construct()
    {
        parent::__construct('Spryker refactorer', '1.0.0');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    public function doRun(InputInterface $input, OutputInterface $output)
    {
        $consoleHelper = new ConsoleHelper($input, $output);
        $consoleHelper->header('Spryker refactorer');

        parent::doRun($input, $output);

        $consoleHelper->success('Done refactoring!');
    }

}
