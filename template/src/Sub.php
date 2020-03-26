<?php namespace App;

abstract class Sub{

    public function make()
    {
        return $this
        ->layBread()
        ->addLettuce()
        ->addPrimaryToppings()
        ->addSauces();
    }

    public function layBread()
    {
        var_dump('laying down the bread');
        return $this;
    }

    public function addLettuce()
    {
        var_dump('add some lettuece');
        return $this;
    }

    public function addSauces()
    {
        var_dump("add oil and vinegar");
        return $this;
    }

    protected abstract function addPrimaryToppings();
}