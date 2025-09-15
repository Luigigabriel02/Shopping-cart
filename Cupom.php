<?php

Declare(strict_types=1);

Namespace Src;

Class Cupom
{
    Private string $codigo;
    Private float $desconto;

    Public function __construct(string $codigo, float $desconto)
    {
        $this->codigo = $codigo;
        $this->desconto = $desconto;
    }

    Public function getCodigo(): string
    {
        Return $this->codigo;
    }

    Public function aplicarDesconto(float $valor): float
    {
        Return $valor – ($valor * $this->desconto);
    }
}

