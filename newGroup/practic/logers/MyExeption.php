<?php

/**
 * Created by PhpStorm.
 * User: Ирина
 * Date: 14.08.2017
 * Time: 19:07
 */
class MyException extends Exception
{
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->logger();

    }


    public function getPathLogFile()
    {
        return date('d-m-y').'-errors.log';
    }

    public function logger()
    {
        file_put_contents($this->getPathLogFile(),$this->template(),FILE_APPEND);
    }


    private function template()
    {
        return
            '=========='.date('d.m.y i:H').'=========='.PHP_EOL
            .'file: '.$this->getFile().PHP_EOL
            .'line: '.$this->getLine().PHP_EOL
            .'code: '.$this->getCode().PHP_EOL
            .'throw:'
            .$this->getMessage().PHP_EOL
            .'=================================='
            .PHP_EOL;
    }
}

try{
    //$a =2/0;
    throw new MyException('throw error text');
    throw new MyException('throw error text 2');
    throw new MyException('throw error text 3');
    throw new MyException('throw error text 4');
}catch (MyException $e){
    var_dump($e);
    echo $e->getMessage().PHP_EOL;
};
