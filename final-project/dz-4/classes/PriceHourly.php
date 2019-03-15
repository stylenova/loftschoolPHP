<?php

require_once 'TraitDriver.php';

/**
 * Почасовый тариф
 * Class tateHourly
 */
class PriceHourly extends AbstractPrise
{
    use TraitDriver;

    public function __construct($age, $GPS = false, bool $isDriver = false)
    {
        parent::__construct(0, 200, $age, $GPS);
        $this->isDriver = $isDriver;
    }

    public function calculate($KM, $Min)
    {
        $arrayTime = explode(':', $Min);
        $hours = $arrayTime[0];
        $minutes = $arrayTime[1];

        $timeMin = $hours * 60 + $minutes;
        $totalHouse = ceil(($timeMin) / 60) * $this->priceMin;

        if ($this->GPS) {
            $totalHouse += $this->getPriceGps($timeMin);
        }

        if ($this->isDriver) {
            $totalHouse += $this->priceDriver;
        }

        return $totalHouse;
    }
}