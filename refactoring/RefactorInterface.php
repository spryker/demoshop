<?php

namespace Spryker\Refactor;

interface RefactorInterface
{

    /**
     * @param Refactor $refactor
     *
     * @throws RefactorException
     *
     * @return void
     */
    public function refactor(Refactor $refactor);

}
