<?php
namespace ygorkauawj\Desafio\Models;

class DropShippingStore extends Store
{
    private int $totalProfit;

    public function __construct(string $storeName, string $cnpj, Adress $adress, float $productValue)
    {
        parent::__construct($storeName, $cnpj, $adress, $productValue);           
    }
    public function sell(int $amount)
    {
        echo "Venda realizada com sucesso! Obrigado por comprar com a {$this->storeName}" . PHP_EOL;
        $this->profit($amount);
        echo "Seu pedido irá chegar em {$this->deadline()} dias!" . PHP_EOL;
    }
    public function profit($amount)
    {
        $sale = $this->productValue * $amount;
        $this->totalProfit += $sale;
    }
    public function deadline(): string
    {
        $state = $this->adress->state;
        if ($state == 'São Paulo') {
            return 20;
        } elseif ($state == 'Rio de Janeiro' or $state == 'Paraná') {
            return 23;
        } else {
            return 30;
        }
    }
    // GETTERS AND SETTERS
    public function getTotalProfit()
    {
        return $this->totalProfit;
    }
}