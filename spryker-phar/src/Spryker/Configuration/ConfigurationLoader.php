<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Configuration;

use Spryker\Configuration\Exception\ConfigurationFileNotFoundException;
use Symfony\Component\Yaml\Yaml;

class ConfigurationLoader implements ConfigurationLoaderInterface
{

    /**
     * @var string
     */
    protected $configFile;

    /**
     * @param string $configFile
     *
     * @throws \Spryker\Configuration\Exception\ConfigurationFileNotFoundException
     */
    public function __construct($configFile)
    {
        if (!file_exists($configFile)) {
            throw new ConfigurationFileNotFoundException(sprintf('File "%s" does not exists. Please add the expected file.', $configFile));
        }

        $this->configFile = $configFile;
    }

    /**
     * @return array
     */
    public function getConfiguration()
    {
        return Yaml::parse(file_get_contents($this->configFile));
    }

}
