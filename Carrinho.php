<?php

declare(strict_types=1);

namespace Src;

class Carrinho
{
    private array $itens = []; // cada item será ['produto' => Produto, 'quantidade' => int, 'subtotal' => float]

    public function adicionarItem(Produto $produto, int $quantidade): string
    {
        if ($quantidade > $produto->getEstoque()) {
            return "Erro: Estoque insuficiente para {$produto->getNome()}.\n";
        }

        $produto->setEstoque($produto->getEstoque() - $quantidade);

        foreach ($this->itens as &$item) {
            if ($item['produto']->getId() === $produto->getId()) {
                $item['quantidade'] += $quantidade;
                $item['subtotal'] = $item['quantidade'] * $produto->getPreco();
                return "Produto atualizado no carrinho: {$produto->getNome()}\n";
            }
        }

        // Se não existe, adiciona novo
        $this->itens[] = [
            'produto' => $produto,
            'quantidade' => $quantidade,
            'subtotal' => $quantidade * $produto->getPreco()
        ];

        return "Produto adicionado ao carrinho: {$produto->getNome()}\n";
    }

    public function removerItem(int $idProduto): string
    {
        foreach ($this->itens as $index => $item) {
            if ($item['produto']->getId() === $idProduto) {
          
                $item['produto']->setEstoque(
                    $item['produto']->getEstoque() + $item['quantidade']
                );

                unset($this->itens[$index]);
                $this->itens = array_values($this->itens); // reorganiza os índices

                return "Produto removido do carrinho.\n";
            }
        }
        return "Erro: Produto não encontrado no carrinho.\n";
    }

    public function listarItens(): string
    {
        if (empty($this->itens)) {
            return "Carrinho vazio.\n";
        }

        $saida = "=== Itens no Carrinho ===\n";
        foreach ($this->itens as $item) {
            $saida .= "{$item['produto']->getNome()} - Quantidade: {$item['quantidade']} - Subtotal: R$ " .
                number_format($item['subtotal'], 2, ',', '.') . "\n";
        }
        $saida .= "Total: R$ " . number_format($this->calcularTotal(), 2, ',', '.') . "\n";

        return $saida;
    }

    public function calcularTotal(): float
    {
        $total = 0.0;
        foreach ($this->itens as $item) {
            $total += $item['subtotal'];
        }
        return $total;
    }

    public function aplicarCupom(Cupom $cupom): float
    {
        return $cupom->aplicarDesconto($this->calcularTotal());
    }
}
