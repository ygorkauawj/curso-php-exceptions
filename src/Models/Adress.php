<?php
namespace ygorkauawj\Desafio\Models;

class Adress
{
    protected string $state;
    private string $street;
    private string $number;

    public function __construct(string $state, string $street, string $number)
    {
        $this->state = $state;
        $this->street = $street;
        $this->number =$number;
    }
    public function __toString()
    {
        return "{$this->street}, {$this->number} - {$this->state}" . PHP_EOL;
    }
    // GETTERS AND SETTERS
    public function getState(): string
    {
        return $this->state;
    }
    public function getStreet()
    {
        return $this->street;
    }
    public function getNumber()
    {
        return $this->number;
    }
}
