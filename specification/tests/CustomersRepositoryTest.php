<?php

use PHPUnit\Framework\TestCase;
use Illuminate\Database\Capsule\Manager as DB;

// vendor\bin\phpunit --colors tests
class CustomersRepositoryTest extends TestCase
{
    protected $customers;

    protected function setUp(): void
    {
        /*
        $this->customers = new CustomersRepository(
            [
                new Customer('gold'),
                new Customer('breeze'),
                new Customer('silver'),
                new Customer('gold'),
            ]
        );
        */

        $this->setUpDatabase();
        $this->migrateTables();
        $this->customers = new CustomersRepository;
    }

    protected function setUpDatabase()
    {
        $database = new DB;
        $database->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory:'
        ]);
        $database->setAsGlobal();
        $database->bootEloquent();
    }

    protected function migrateTables()
    {
        DB::schema()->create('customers', function($table){
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });

        Customer::create(['name' => 'Joe', 'type' => 'gold']);
        Customer::create(['name' => 'Jane', 'type' => 'silver']);
    }

    /** @test */
    function test_fetches_all_customers()
    {
        $results = $this->customers->all();   
        $this->assertCount(2, $results);
    }

    
    function test_fetches_all_customer_who_match_a_given_specification()
    {
        /*
        $customers = new CustomersRepository(
            [
                new Customer('gold'),
                new Customer('breeze'),
                new Customer('silver'),
                new Customer('gold'),
            ]
        );
        */

        $spec = new CustomerIsGold;
        $results = $this->customers->whoMatch(new CustomerIsGold);
        $this->assertCount(1, $results);
    }
    
}