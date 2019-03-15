<?php

require_once 'AbstractPrise.php';

class PriceStudent extends AbstractPrise
{

    public function __construct($age, bool $GPS = false)
    {
        if ($age < 18 || $age >= 26) {
            echo 'Не подходите по возрасту!';
            die;
        }
        parent::__construct(4, 4, $age, $GPS);
    }
}