<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\TransferInterface\UniqueInterface;
use Pyz\Shared\Mail\Transfer\Invoice;

class PrintFileCheckFailure extends Invoice implements UniqueInterface
{
}
