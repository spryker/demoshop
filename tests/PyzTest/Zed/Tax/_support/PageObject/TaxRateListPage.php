<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\Tax\PageObject;

class TaxRateListPage
{
    public const URL = '/tax/rate/list';

    public const SELECTOR_DATA_TABLE = '.dataTables_wrapper';

    public const SELECTOR_SEARCH = 'input.form-control.input-sm';
    public const SELECTOR_DELETE = 'Delete';
    public const SELECTOR_EDIT = 'i.fa.fa-pencil-square-o';

    public const MESSAGE_EMPTY_TABLE = 'No matching records found';
}
