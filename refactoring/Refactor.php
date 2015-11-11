<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Refactor;

class Refactor
{

    /**
     * @var RefactorInterface[]
     */
    protected $refactorer = [];

    /**
     * @param RefactorInterface $refactorer
     *
     * @return self
     */
    public function addRefactorer(RefactorInterface $refactorer)
    {
        $this->refactorer[] = $refactorer;

        return $this;
    }

    public function run()
    {
        foreach ($this->refactorer as $refactorer) {
            $refactorer->refactor($this);
        }
    }

}
