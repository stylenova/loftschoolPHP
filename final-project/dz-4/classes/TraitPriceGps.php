<?php
/**
 * Created by PhpStorm.
 * User: style
 * Date: 26.02.2019
 * Time: 23:28
 */

trait TraitPriceGps
{
    private $priceAddGps = 15;

    /**
     * Стоимость минуты с GPS
     * @param $Min
     * @return float|int
     */
    public function getPriceGps($Min)
    {
        return (ceil($Min / 60) * $this->priceAddGps);
    }
}