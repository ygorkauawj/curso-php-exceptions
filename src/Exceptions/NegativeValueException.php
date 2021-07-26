<?php
namespace ygorkauawj\Desafio\Exceptions;
use DomainException;

class NegativeValueException extends DomainException
{
    public function __construct()
    {
        parent::__construct("Você não pode inserir um valor negativo." . PHP_EOL);
    }
}