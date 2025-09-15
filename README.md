# 🛒 Simulador de Carrinho de Compras

Projeto desenvolvido para a disciplina **Design Patterns & Clean Code**.

## 👥 Integrantes
- Luigi Gabriel — RA 2009016

## 📌 Objetivo
Simular um carrinho de compras simples em PHP, aplicando boas práticas de código:
- PSR-12
- DRY (Don’t Repeat Yourself)
- KISS (Keep It Simple, Stupid)

## 🚀 Como Executar
1. Instale o **XAMPP**.
2. Coloque a pasta `carrinho/` dentro do diretório `htdocs/`.
3. Inicie o Apache no XAMPP.
4. Acesse no navegador:

# Casos de Uso – Carrinho de Compras

## Caso 1 — Usuário adiciona um produto válido
- **Entrada**: produto id=1, quantidade=2  
- **Resultado esperado**: produto adicionado ao carrinho, estoque atualizado  

## Caso 2 — Usuário tenta adicionar além do estoque
- **Entrada**: produto id=3, quantidade=10  
- **Resultado esperado**: mensagem de erro → “Estoque insuficiente”  

## Caso 3 — Usuário remove produto do carrinho
- **Entrada**: produto id=2  
- **Resultado esperado**: produto removido, estoque restaurado  

## Caso 4 — Aplicação de cupom de desconto
- **Entrada**: cupom DESCONTO10  
- **Resultado esperado**: valor total reduzido em 10%  
