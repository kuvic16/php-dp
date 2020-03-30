<?php

interface Logger{
    public function log($data);
}


// encapsulate and make them interchangeable
class LogToFile implements Logger{
    public function log($data){
        var_dump('Log the data to a file');
    }
}

class LogToDatabase implements Logger{
    public function log($data){
        var_dump('Log the data to a database');
    }
}

class LogToXWebService implements Logger{
    public function log($data){
        var_dump('Log the data to a webservice');
    }
}

class App{
    // this is tightly coupled. Logger is hardcoded.
    public function log($data){
        $logger = new LogToFile;
        $logger->log($data);
    }

    // strategy design pattern which made loosly coupled
    // and dynamic binding
    public function strategyLog($data, Logger $logger = null){
        $logger = $logger ?: new LogToFile;
        $logger->log($data);
    }
}

$app = new App;
$app->log('Some information here!!');

$app->strategyLog('Some information from strategy desing pattern', new LogToXWebService);
$app->strategyLog('Some information from strategy desing pattern');

