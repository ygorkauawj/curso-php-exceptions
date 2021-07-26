<?php

use ygorkauawj\Desafio\Models\Adress;
use ygorkauawj\Desafio\Models\StandartStore;

require_once 'autoload.php';

$store = new StandartStore(
    'Loja do seu Jorginho', 
    '53.276.675/0001-24', 
    new Adress(
        'São Paulo', 
        'Rua São João', 
        '530'), 
    70.50, 
    5
);

$store->sell(2);
$store->getTotalProfit();
$store->sell(4);
$store->getTotalProfit();

