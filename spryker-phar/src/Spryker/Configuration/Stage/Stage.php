<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Configuration\Stage;

use Spryker\Configuration\Exception\SectionExistsException;
use Spryker\Configuration\Section\SectionInterface;

class Stage implements StageConfigurationInterface, StageInterface
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \Spryker\Configuration\Section\SectionInterface[]
     */
    protected $sections = [];

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \Spryker\Configuration\Section\SectionInterface $section
     *
     * @throws \Spryker\Configuration\Exception\SectionExistsException
     *
     * @return $this
     */
    public function addSection(SectionInterface $section)
    {
        if (isset($this->sections[$section->getName()])) {
            throw new SectionExistsException(sprintf('Section with name "%s" already exists.', $section->getName()));
        }

        $this->sections[$section->getName()] = $section;

        return $this;
    }

    /**
     * @return \Spryker\Configuration\Section\SectionInterface[]
     */
    public function getSections()
    {
        return $this->sections;
    }

}
