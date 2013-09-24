<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\TransferInterface\UniqueInterface;
use Pyz\Shared\Mail\Transfer\Invoice;

class SecondArtistArtworkAvailabilityReminder extends Invoice implements UniqueInterface
{
}
