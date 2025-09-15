<?php

require_once __DIR__ . '/../src/Produto.php';
require_once __DIR__ . '/../src/Estoque.php';
require_once __DIR__ . '/../src/Carrinho.php';
require_once __DIR__ . '/../src/Cupom.php';

use Src\Estoque;
use Src\Carrinho;
use Src\Cupom;

$estoque = new Estoque();
$carrinho = new Carrinho();

$produto = $estoque->buscarProduto(1);
echo $carrinho->adicionarItem($produto, 2);

$produto = $estoque->buscarProduto(3);
echo $carrinho->adicionarItem($produto, 10);

echo $carrinho->removerItem(1);

$produto = $estoque->buscarProduto(2);
echo $carrinho->adicionarItem($produto, 1);

echo $carrinho->listarItens();

$cupom = new Cupom("DESCONTO10", 0.1);
echo "Total com desconto: R$ " . number_format($carrinho->aplicarCupom($cupom), 2, ',', '.') . "\n";

