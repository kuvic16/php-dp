<?php

use PHPUnit\Framework\TestCase;

// vendor\bin\phpunit --colors tests
class CustomersRepositoryTest extends TestCase
{
    protected $customers;

    protected function setUp(): void
    {
        $this->customers = new CustomersRepository(
            [
                new Customer('gold'),
                new Customer('breeze'),
                new Customer('silver'),
                new Customer('gold'),
            ]
        );
    }

    /** @test */
    function test_fetches_all_customers()
    {
        $results = $this->customers->all();   
        $this->assertCount(4, $results);
    }

    
    function test_fetches_all_customer_who_match_a_given_specification()
    {
        $customers = new CustomersRepository(
            [
                new Customer('gold'),
                new Customer('breeze'),
                new Customer('silver'),
                new Customer('gold'),
            ]
        );
        $spec = new CustomerIsGold;
        $results = $customers->matchingSpecification(new CustomerIsGold);
        $this->assertCount(2, $results);
    }
    
}