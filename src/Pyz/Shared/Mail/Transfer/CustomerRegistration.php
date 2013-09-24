<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\TransferInterface\UniqueInterface;

use ProjectA\Shared\Mail\Transfer\Customer;

class CustomerRegistration extends Customer implements UniqueInterface
{
}
