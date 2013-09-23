<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\Order;
use ProjectA\Shared\Mail\Transfer\TransferInterface\UniqueInterface;

class ManualProcess extends Order implements UniqueInterface
{
}
