<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Refactor\Console;

use Symfony\Component\Console\Style\SymfonyStyle;

class ConsoleHelper extends SymfonyStyle
{

    /**
     * @param string $header
     *
     * @return void
     */
    public function header($header)
    {
        $output = PHP_EOL . PHP_EOL . '  ' . $header . PHP_EOL;
        $this->writeln(sprintf('<fg=white;options=bold;bg=green>%s</fg=white;options=bold;bg=green>', $output));
    }

    /**
     * @param string $name
     * @param string $description
     *
     * @return void
     */
    public function commandInfo($name, $description)
    {
        $this->newLine(3);
        $this->section($name);

        if ($description) {
            $this->comment($description);
        }
    }

}
