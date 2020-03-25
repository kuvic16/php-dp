<?php namespace Acme;

class Nook implements eReaderInterface{
    public function turnOn()
    {
        var_dump("turn the nook on");
    }

    public function pressNextButton()
    {
        var_dump("press the next button on the nook");
    }
}