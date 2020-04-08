<?php

use PHPUnit\Framework\TestCase;

// vendor\bin\phpunit --colors tests
class CustomersRepositoryTest extends TestCase
{
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
        $results = $customers->bySpecification(new CustomerIsGold);
        $this->assertCount(2, $results);
    }
}