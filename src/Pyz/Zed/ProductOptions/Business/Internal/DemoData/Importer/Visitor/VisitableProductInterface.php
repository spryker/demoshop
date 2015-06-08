<?php

namespace Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Visitor;

interface VisitableProductInterface
{

    /**
     * @param ProductVisitorInterface $visitor
     */
    public function accept(ProductVisitorInterface $visitor);
}
