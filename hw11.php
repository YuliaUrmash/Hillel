<?php

interface Taxi
{
    public function cost();
    public function model();
}

abstract class TaxiCall
{
    abstract public function chooseTaxi();

    public function getTaxi()
    {
        $cost = $this->chooseTaxi()->cost();
        $model = $this->chooseTaxi()->model();
        return compact('cost', 'model');

    }
}

class EconomyTaxi implements Taxi
{
    public function cost()
    {
        return '100';
    }

    public function model()
    {
        return 'Economy';
    }
}

class Economy extends TaxiCall
{

    public function chooseTaxi()
    {
        return new EconomyTaxi();
    }
}

class StandardTaxi implements Taxi
{
    public function cost()
    {
        return '200';
    }

    public function model()
    {
        return 'Standard';
    }
}

class Standard extends TaxiCall
{

    public function chooseTaxi()
    {
        return new StandardTaxi();
    }
}

class LuxTaxi implements Taxi
{
    public function cost()
    {
        return '500';
    }

    public function model()
    {
        return 'Lux';
    }
}

class Lux extends TaxiCall
{

    public function chooseTaxi()
    {
        return new LuxTaxi();
    }
}

$economy = new Economy();
print_r($economy->getTaxi());
$standard = new Standard();
print_r($standard->getTaxi());
$luxury = new Lux();
print_r($luxury->getTaxi());

