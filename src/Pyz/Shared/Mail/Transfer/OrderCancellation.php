<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\Order;
use ProjectA\Shared\Mail\Transfer\TransferInterface\UniqueInterface;

class OrderCancellation extends Order implements UniqueInterface
{
}
