<?php
namespace ygorkauawj\Desafio\Models;

use ygorkauawj\Desafio\Exceptions\InvalidCnpjException;
use ygorkauawj\Desafio\Models\Adress;
use ygorkauawj\Desafio\Exceptions\NegativeValueException;

abstract class Store 
{
    private string $storeName;
    private string $cnpj;
    protected Adress $adress;
    private float $productValue;

    public function __construct(string $storeName, string $cnpj, Adress $adress, float $productValue)
    {
        $this->storeName = $storeName;
        try {
            $this->checkCnpj($cnpj);
        } catch (InvalidCnpjException $exception) {
            echo $exception->getMessage($cnpj);
            exit();
        }
        $this->cnpj = $cnpj;
        $this->adress = $adress;
        try {
            $this->checkProductValue($productValue);
        } catch (NegativeValueException $exception) {
            echo $exception->getMessage();
            exit();
        }
        $this->productValue = $productValue;
    }

    private function checkCnpj(string $document): bool
    {
        // catch the numbers
        $cnpj = preg_replace('/[^0-9]/is', '', $document);
        // check string size
        if (strlen($cnpj) != 14) {
            return false;
        }
        // verify if the numbers are the same. Ex: 11.111.111/111-11
        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }
        // verify check digits
        for ($t = 12; $t < 14; $t++) {
            for ($d = 0, $m = ($t - 7), $i = 0; $i < $t; $i++) {
                $d += $cnpj[$i] * $m;
                $m = ($m == 2 ? 9 : --$m);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cnpj[$i] != $d) {
                return false;
            }
        }
        return true;
    }

    private function checkProductValue($productValue)
    {
        if ($productValue <= 0) {
            throw new NegativeValueException();
        }
        return;
    }

    // GETTERS AND SETTERS

    public function getStoreName()
    {
        return $this->storeName;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function getProductValue()
    {
        return $this->productValue;
    }

    public function getAdress()
    {
        return $this->adress;
    }
}