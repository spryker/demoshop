<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

interface VisitableOptionInterface
{

    /**
     * @param OptionVisitorInterface $visitor
     */
    public function accept(OptionVisitorInterface $visitor);

}
