<?php
namespace ygorkauawj\Desafio\Models;

use ygorkauawj\Desafio\Exceptions\OutOfStockException;
use ygorkauawj\Desafio\Exceptions\NegativeValueException;

class StandardStore extends Store implements Sell
{
    private int $stock;
    private int $totalProfit;

    public function __construct(string $storeName, string $cnpj, Adress $adress, float $productValue, int $stock)
    {
        parent::__construct($storeName, $cnpj, $adress, $productValue);
        try {
            $this->checkAddStock($stock);
        } catch (NegativeValueException $exception) {
            echo $exception->getMessage();
            exit();
        }
        $this->stock = $stock;  
        $this->totalProfit = 0;    
    }
    public function sell(int $amount)
    {   
        try{
            echo $this->checkSellStock($amount) . PHP_EOL;
        } catch (OutOfStockException $exception) {
            echo $exception->getMessage();
            exit();
        } finally {
            echo "Quantidade restante no estoque: {$this->stock}" . PHP_EOL;
        }
        
        $this->profit($amount);
        echo "Seu pedido irá chegar em {$this->deadline()} dias!" . PHP_EOL;
    }
    public function profit(int $amount): void
    {
        $sale =(float) $this->getProductValue() * $amount;
        $sale = $sale - ($sale * $this->cityTax());
        $this->totalProfit += $sale;
    }
    public function deadline(): string
    {
        $state =(string) $this->adress->getState();
        if ($state == 'São Paulo') {
            return 2;
        } elseif ($state == 'Rio de Janeiro' or $state == 'Paraná') {
            return 3;
        } else {
            return 5;
        }
    }
    private function checkAddStock($stock)
    {
        if ($stock <= 0) {
            throw new NegativeValueException('Você não pode adicionar um valor negativo ao estoque.' . PHP_EOL);
        }
        return;
    }
    private function checkSellStock($saleAmount)
    {
        if ($saleAmount > $this->stock) {
            throw new OutOfStockException($this->stock);
        }
        $this->stock -= $saleAmount;
        return "Venda realizada com sucesso! Obrigado por comprar com a {$this->getStoreName()}";
    }
    public function cityTax(): float
    {
        $state = $this->adress->getState();
        if ($state == 'São Paulo') {
            return 0.1;
        } elseif ($state == 'Rio de Janeiro' or $state == 'Paraná') {
            return 0.15;
        } else {
            return 0.2;
        }
    }
    // GETTERS AND SETTERS
    public function getTotalProfit()
    {
        return $this->totalProfit;
    }
}