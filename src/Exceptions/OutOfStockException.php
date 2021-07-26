<?php
namespace ygorkauawj\Desafio\Exceptions;
use DomainException;

class OutOfStockException extends DomainException
{
    public function __construct($stock)
    {
        $message = "Temos apenas $stock unidades, por favor tente outra quantidade." . PHP_EOL;
        parent::__construct($message);
    }
}