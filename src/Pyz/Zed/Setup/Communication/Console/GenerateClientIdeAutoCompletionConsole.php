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

    const COMMAND_NAME = 'setup:generate-client-ide-auto-completion';

    protected function configure()
    {
        $this->setName(self::COMMAND_NAME);
        $this->setDescription('Generate the bundle ide auto completion interface for the Client.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->generateClientInterface();
        $this->generateClientBundleInterface();
        $this->generateClientFactoryInterface();
    }

    protected function generateClientInterface()
    {
        $options = $this->getClientDefaultOptions();

        $generator = new IdeAutoCompletionGenerator($options, $this);
        $generator
            ->addMethodTagBuilder(new GeneratedInterfaceMethodTagBuilder(
                [
                    GeneratedInterfaceMethodTagBuilder::OPTION_METHOD_STRING_PATTERN => ' * @method \\Generated\Client\Ide\{{bundle}} {{methodName}}()',
                ]
            ))
        ;
        $generator->create();

        $this->info('Generated Client IdeAutoCompletion file');
    }

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
            ->addMethodTagBuilder(new ClientMethodTagBuilder())
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
