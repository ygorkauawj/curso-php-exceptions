<?php
namespace ygorkauawj\Desafio\Exceptions;
use DomainException;

class InvalidCnpjException extends DomainException
{
    public function __construct($cnpj) {
        $message = "o CNPJ $cnpj informado é inválido." . PHP_EOL;
        parent::__construct($message);
    }
}