<?php

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

//echo (new BasicInspection())->getCost();
echo (new BasicInspectionAndOilChange())->getCost();
