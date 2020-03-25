<?php namespace Acme;

use Acme\BookInterface;

class eReaderAdapter implements BookInterface{
    
    private $reader;

    public function __construct($reader)
    {
        $this->reader = $reader;
    }
    
    public function open()
    {
        return $this->reader->turnOn();
    }   

    public function turnPage()
    {
        return $this->reader->pressNextButton();
    }
}