<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

interface VisitableOptionInterface
{

    /**
     * @param OptionsVisitorInterface $visitor
     */
    public function accept(OptionsVisitorInterface $visitor);
}
