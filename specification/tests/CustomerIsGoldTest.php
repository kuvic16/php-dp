<?php

use PHPUnit\Framework\TestCase;

class CustomerIsGoldTest extends TestCase
{
    function test_customer_is_gold_if_they_have_the_respective_type()
    {
        //new CustomerIsGold;
        $specification = new CustomerIsGold;
        $goldCustomer = new Customer('gold');
        $silverCustomer = new Customer('silver');

        $this->assertTrue($specification->isSatisfiedBy($goldCustomer));
        $this->assertFalse($specification->isSatisfiedBy($silverCustomer));
    }  
}