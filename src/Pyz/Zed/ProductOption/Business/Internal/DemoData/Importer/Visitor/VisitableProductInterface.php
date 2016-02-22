<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

interface VisitableProductInterface
{

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface $visitor
     *
     * @return void
     */
    public function accept(ProductVisitorInterface $visitor);

}
