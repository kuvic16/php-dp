<?php

class CustomerIsGold
{
    public function isSalisfiedBy(Customer $customer)
    {
        return $customer->type == 'gold';
    }   
}

