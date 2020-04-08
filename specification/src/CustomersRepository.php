<?php

class CustomersRepository{
    public function bySpecification($specification)
    {
        return $specification->isSatisfiedBy($customer);
    }    
}