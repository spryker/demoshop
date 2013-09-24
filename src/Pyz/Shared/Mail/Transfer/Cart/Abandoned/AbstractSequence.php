<?php

namespace Pyz\Shared\Mail\Transfer\Cart\Abandoned;

class AbstractSequence extends AbstractStep
{

    /**
     * @var string
     */
    protected $incrementId;
    protected $_incrementId = array('is_string');
}
