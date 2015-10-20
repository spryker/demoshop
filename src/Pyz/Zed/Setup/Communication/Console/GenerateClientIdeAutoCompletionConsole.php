<?php

namespace Pyz\Zed\Setup\Communication\Console;

use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\ClientMethodTagBuilder;
use SprykerFeature\Shared\Library\Config;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Zed\Console\Business\Model\Console;
use SprykerEngine\Zed\Kernel\BundleNameFinder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\IdeAutoCompletionGenerator;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\IdeBundleAutoCompletionGenerator;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\IdeFactoryAutoCompletionGenerator;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\ConstructableMethodTagBuilder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\GeneratedInterfaceMethodTagBuilder;
use SprykerFeature\Zed\Setup\Communication\Console\GenerateClientIdeAutoCompletionConsole as SprykerGenerateClientIdeAutoCompletionConsole;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateClientIdeAutoCompletionConsole extends SprykerGenerateClientIdeAutoCompletionConsole
{

    const MULTI_CORE_VENDOR_PATH_PATTERN = APPLICATION_VENDOR_DIR . '/*/spryker/Bundles/*/src';

    /**
     * @return array
     */
    protected function getClientDefaultOptions()
    {
        $options = [
            IdeAutoCompletionGenerator::OPTION_KEY_NAMESPACE => 'Generated\Client\Ide',
            IdeAutoCompletionGenerator::OPTION_KEY_LOCATION_DIR => APPLICATION_SOURCE_DIR . '/Generated/Client/Ide/',
            IdeAutoCompletionGenerator::OPTION_KEY_APPLICATION => 'Client',
            IdeAutoCompletionGenerator::OPTION_KEY_BUNDLE_NAME_FINDER => new BundleNameFinder(
                [
                    BundleNameFinder::OPTION_KEY_APPLICATION => 'Client',
                    BundleNameFinder::OPTION_KEY_BUNDLE_PROJECT_PATH_PATTERN => $this->getProjectNamespace() . '/',
                    BundleNameFinder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN,
                ]
            ),
        ];

        return $options;
    }

    protected function generateClientBundleInterface()
    {
        $options = $this->getClientDefaultOptions();
        $options[IdeBundleAutoCompletionGenerator::OPTION_KEY_INTERFACE_NAME] = 'BundleAutoCompletion';

        $generator = new IdeBundleAutoCompletionGenerator($options);
        $generator
            ->addMethodTagBuilder(new ClientMethodTagBuilder([
                ClientMethodTagBuilder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN,
            ]))
        ;

        $generator->create();

        $this->info('Generated Client IdeBundleAutoCompletion file');
    }

    protected function generateClientFactoryInterface()
    {
        $methodTagGenerator = new ConstructableMethodTagBuilder([
            ConstructableMethodTagBuilder::OPTION_KEY_PATH_PATTERN => 'Service/',
            ConstructableMethodTagBuilder::OPTION_KEY_APPLICATION => 'Client',
            ConstructableMethodTagBuilder::OPTION_KEY_CLASS_NAME_PART_LEVEL => 4,
            ConstructableMethodTagBuilder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN,
        ]);

        $options = [
            IdeFactoryAutoCompletionGenerator::OPTION_KEY_NAMESPACE => 'Generated\Client\Ide\FactoryAutoCompletion',
            IdeFactoryAutoCompletionGenerator::OPTION_KEY_LOCATION_DIR => APPLICATION_SOURCE_DIR . '/Generated/Client/Ide/',
            IdeFactoryAutoCompletionGenerator::OPTION_KEY_HAS_LAYERS => true,
            IdeFactoryAutoCompletionGenerator::OPTION_KEY_APPLICATION => 'Client',
            IdeFactoryAutoCompletionGenerator::OPTION_KEY_BUNDLE_NAME_FINDER => new BundleNameFinder(
                [
                    IdeFactoryAutoCompletionGenerator::OPTION_KEY_APPLICATION => 'Client',
                    BundleNameFinder::OPTION_KEY_BUNDLE_PROJECT_PATH_PATTERN => $this->getProjectNamespace() . '/',
                    BundleNameFinder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN,
                ]
            ),
        ];

        $generator = new IdeFactoryAutoCompletionGenerator($options);
        $generator->addMethodTagBuilder($methodTagGenerator);

        $generator->create();

        $this->info('Generated Client IdeFactoryAutoCompletion file');
    }

    /**
     * @throws \Exception
     *
     * @return string
     */
    private function getProjectNamespace()
    {
        return Config::get(SystemConfig::PROJECT_NAMESPACES)[0];
    }

}
