<?php

require_once 'TraitDriver.php';

class PriceDaily extends AbstractPrise
{
    use TraitDriver;

    public function __construct($age, $GPS = false, bool $isDriver = false)
    {
        parent::__construct(1, 1000, $age, $GPS);
        $this->isDriver = $isDriver;
    }

    /**
     * Калькулятор подсчета тарифа, формат передачи времени дни:часы:минуты
     * @param $km
     * @param $Min
     * @return float|int|void
     */
    public function calculate($km, $Min)
    {
        $arrayTime = explode(':', $Min);
        $day = $arrayTime[0];
        $hours = $arrayTime[1];
        $minutes = $arrayTime[2];
        $timeHire = $day * 24 * 60 + $hours * 60 + $minutes;
        $numberDya = ceil(($timeHire - 29) / 1440);

        if ($numberDya == 0) {
            $numberDya = 1;
        }

        $total = $numberDya * $this->priceMin;

        if ($this->GPS) {
            $total += $this->getPriceGps($timeHire);
        }

        if ($this->isDriver) {
            $total += $this->priceDriver;
        }

        return $total;
    }
}