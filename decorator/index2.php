<?php

// implementation of decorator design pattern

interface CarService{
    public function getCost();

    public function getDescription();
}

class BasicInspection implements CarService {
    public function getCost()
    {
        return 25;
    }

    public function getDescription()
    {
        return 'Basic Inspection';   
    }
}

class OilChange implements CarService{
    protected $carService;

    function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 29 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ', and oil change';   
    }
}

class TireRotation implements CarService{
    protected $carService;

    function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 15 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ', and tire rotation';   
    }
}

//echo (new BasicInspection())->getCost();
//echo (new OilChange(new BasicInspection()))->getCost();
//echo (new TireRotation(new OilChange(new BasicInspection())))->getCost();
//echo (new TireRotation(new BasicInspection()))->getCost();

//echo (new BasicInspection())->getDescription();
//echo (new OilChange(new BasicInspection()))->getDescription();
//echo (new TireRotation(new OilChange(new BasicInspection())))->getDescription();
echo (new TireRotation(new BasicInspection()))->getCost();
