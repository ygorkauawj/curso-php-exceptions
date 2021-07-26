<?php
namespace ygorkauawj\Desafio\Models;

interface Sell
{
    // this function make a sale
    public function sell(int $amount);

    // this function calculate the profit of the sell based on the store taxes
    public function profit(int $amount): void;

    // this function return the deadline
    public function deadline(): string;
}