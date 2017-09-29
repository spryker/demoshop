<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Generator;

use Codeception\Exception\ConfigurationException;
use Codeception\Util\Shared\Namespaces;
use Codeception\Util\Template;

class Cest
{

    use Namespaces;
    use Shared\Classname;

    protected $template = <<<EOF
<?php
{{namespace}}

class {{name}}Cest
{
    public function _before({{actor}} \$I)
    {
    }

    public function _after({{actor}} \$I)
    {
    }

    // tests
    public function tryToTest({{actor}} \$I)
    {
    }
}

EOF;

    protected $settings;

    protected $name;

    public function __construct($className, $settings)
    {
        $this->name = $this->removeSuffix($className, 'Cest');
        $this->settings = $settings;
    }

    public function produce()
    {
        $actor = $this->settings['actor'];
        if (!$actor) {
            throw new ConfigurationException("Cept can't be created for suite without an actor. Add `actor: SomeTester` to suite config");
        }

        $namespace = rtrim($this->settings['namespace'], '\\');
        $ns = $this->getNamespaceHeader($namespace . '\\' . $this->name);
        if ($ns) {
            $ns .= "use " . $this->settings['namespace'] . '\\' . $actor . ";";
        }

        return (new Template($this->template))
            ->place('name', $this->getShortClassName($this->name))
            ->place('namespace', $ns)
            ->place('actor', $actor)
            ->produce();
    }

}
