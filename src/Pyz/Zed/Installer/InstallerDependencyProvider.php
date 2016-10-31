<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer;

use Spryker\Zed\Acl\Communication\Plugin\Installer as AclInstallerPlugin;
use Spryker\Zed\Country\Communication\Plugin\Installer as CountryInstallerPlugin;
use Spryker\Zed\Glossary\Communication\Plugin\Installer as GlossaryInstallerPlugin;
use Spryker\Zed\Installer\InstallerDependencyProvider as SprykerInstallerDependencyProvider;
use Spryker\Zed\Locale\Communication\Plugin\Installer as LocaleInstallerPlugin;
use Spryker\Zed\Newsletter\Communication\Plugin\Installer as NewsletterInstallerPlugin;
use Spryker\Zed\Price\Communication\Plugin\Installer as PriceInstallerPlugin;
use Spryker\Zed\User\Communication\Plugin\Installer as UserInstallerPlugin;

class InstallerDependencyProvider extends SprykerInstallerDependencyProvider
{

    /**
     * @return \Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin[]
     */
    public function getInstallerPlugins()
    {
        return [
            new PriceInstallerPlugin(),
            new LocaleInstallerPlugin(),
            new CountryInstallerPlugin(),
            new UserInstallerPlugin(),
            new AclInstallerPlugin(),
            new NewsletterInstallerPlugin(),
            new GlossaryInstallerPlugin(),
        ];
    }

}
