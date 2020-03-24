<?php


// scenerio where we can use decorator design pattern

class BasicInspection{
    public function getCost()
    {
        return 19;
    }    
}

class BasicInspectionAndOilChange{
    public function getCost()
    {
        return 19 + 19;
    }
}

class BasicInspectionAndOilChangeAndTireRotation{
    public function getCost()
    {
        return 19 + 19 + 10;
    }
}


//echo (new BasicInspection())->getCost();
//echo (new BasicInspectionAndOilChange())->getCost();
echo (new BasicInspectionAndOilChangeAndTireRotation())->getCost();
