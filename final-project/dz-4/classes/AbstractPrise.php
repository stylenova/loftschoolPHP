<?php

require_once 'InterfaceCalculate.php';
require_once 'TraitPriceGps.php';

/**
 * Class AbstractPrise
 */
abstract class AbstractPrise implements InterfaceCalculate
{
    use TraitPriceGps;

    protected $priceKM;
    protected $priceMin;
    protected $age;
    protected $GPS = false; // Если true, то 15 руб за минуту
    protected $youngDrivers = 1;

    /**
     * AbstractPrise constructor.
     * @param $priceKM
     * @param $priceMin
     * @param $age
     * @param bool $GPS
     */
    public function __construct($priceKM, $priceMin, $age, $GPS = false)
    {
        $this->priceKM = $priceKM;
        $this->priceMin = $priceMin;
        $this->age = $age;
        $this->GPS = $GPS;

        if ($age < 18 && $age > 65) {
            echo 'Ваш возраст не позволяет воспользоваться нашими услгами!';
            die;
        }

        if ($age >= 18 && $age <= 21) {
            $this->youngDrivers = 1.1; // +10% к цене за минуту
        }
    }

    /**
     * Калькулятор стоимости
     * @param $KM
     * @param $Min
     * @return float|int
     */
    public function calculate($KM, $Min)
    {
        $costTootal = ceil($KM * $this->priceKM + $Min * $this->priceMin) * $this->youngDrivers;

        if ($this->GPS) {
            $costTootal += $this->getPriceGps($Min);
        }

        return $costTootal;
    }
}
