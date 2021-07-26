<?php

use ygorkauawj\Desafio\Models\Adress;
use ygorkauawj\Desafio\Models\DropShippingStore;
use ygorkauawj\Desafio\Models\StandardStore;

require_once 'autoload.php';

$store = new StandardStore(
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
$store->sell(3);
echo "O lucro na {$store->getStoreName()} é de R$ {$store->getTotalProfit()}" . PHP_EOL;


$dropshipping = new DropShippingStore(
    'Loja do João Balão', 
    '04.628.316/0001-83', 
    new Adress(
        'Rio de Janeiro', 
        'Avenida Copacabana', 
        '1020'), 
    120.30
);

$dropshipping->sell(50);
$dropshipping->sell(20);
echo "O lucro na {$dropshipping->getStoreName()} é de R$ {$dropshipping->getTotalProfit()}" . PHP_EOL;

