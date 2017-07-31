<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Tax\Zed\PageObject;

class TaxRateListPage
{

    const URL = 'tax/rate/list';

    const SELECTOR_DATA_TABLE = '.dataTables_wrapper';

    const SELECTOR_SEARCH = 'input.form-control.input-sm';
    const SELECTOR_DELETE = 'Delete';
    const SELECTOR_EDIT = 'i.fa.fa-pencil-square-o';

    const MESSAGE_EMPTY_TABLE = 'No matching records found';

}
