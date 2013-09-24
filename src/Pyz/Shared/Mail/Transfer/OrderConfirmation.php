<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\TransferInterface\UniqueInterface;

class OrderConfirmation extends Invoice implements UniqueInterface
{

}
