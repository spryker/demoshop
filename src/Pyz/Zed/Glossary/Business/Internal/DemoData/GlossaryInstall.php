<?php

namespace Pyz\Zed\Glossary\Business\Internal\DemoData;

use Pyz\Zed\Glossary\Business\Importer;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;

class GlossaryInstall extends AbstractInstaller
{

    protected $importer;

    /**
     * @param Importer $importer
     */
    public function __construct(Importer $importer)
    {
        $this->importer = $importer;
    }

    public function install()
    {
        $this->info('This will install a standard set of translations in the demo shop');
        $this->importer->import();
    }

}
