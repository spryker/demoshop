<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\TransferInterface\UniqueInterface;
use ProjectA\Shared\Mail\Transfer\Order;

class ReceiptOfOrder extends Order implements UniqueInterface
{

}
