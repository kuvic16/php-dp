<?php

class CustomersRepository{
    protected $customers;

    /*
    public function __construct(array $customers)
    {
        $this->customers = $customers;
    }
    */
    
    public function matchingSpecification($specification)
    {
        /*
        $matches = [];
        foreach($this->all() as $customer){
            if($specification->isSatisfiedBy($customer)){
                $matches[] = $customer;
            }
        }
        return $matches;
        */
        $customers = Customer::query();
        $customers = $specification->asScope($customers);
        return $customers->get();

    }

    public function whoMatch($specification)
    {        
        $customers = Customer::query();
        $customers = $specification->asScope($customers);
        return $customers->get();

    }
    
    public function all()
    {
        //return $this->customers;
        return Customer::all();
    }
}