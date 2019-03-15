<?php

require_once 'AbstractPrise.php';
require_once 'TraitDriver.php';

/**
 * Базовый тариф
 * Class rateBase
 */
class PriceBase extends AbstractPrise
{
    public function __construct($age, bool $GPS = false)
    {
        parent::__construct(3, 10, $age, $GPS);
    }
}
