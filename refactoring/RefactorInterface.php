<?php

namespace Spryker\Refactor;

interface RefactorInterface
{

    /**
     * @param Refactor $refactor
     *
     * @throws RefactorException
     *
     * @return bool
     */
    public function refactor(Refactor $refactor);

}
