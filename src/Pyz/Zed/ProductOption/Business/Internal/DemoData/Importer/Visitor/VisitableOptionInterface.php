<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

interface VisitableOptionInterface
{

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\OptionVisitorInterface $visitor
     */
    public function accept(OptionVisitorInterface $visitor);

}
