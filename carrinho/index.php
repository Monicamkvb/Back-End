<?php

//inicia sessão
session_start();

class Produto{
    public $id;
    public $nome;
    public $valor;
    public $desc;

    public function __construct($nome,$valor,$desc){
        $this->$nome = $nome;
        $this->$valor = $valor;
        $this->$desc = $desc;
    }
}

// public - qualquer parte do código mexe no atributo
// private - apenas o que está dentro do class

//verifica se algo está null
if (!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = [];

//adiciona um produto
if (isset($_GET['produto'])){
    $produtosDados = new Produto($_GET['produto'],$_GET['valor'],$_GET['desc']);
    $_SESSION['carrinho'][] = $produtosDados;
}
}

if (isset($_GET['limpar'])) {
    $_SESSION['carrinho'] = [];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <h1>Carrinho de Compras</h1>

    <p><a href="?produto=oleo&valor=39.99&desc='O melhor óleo capilar que'">Adicionar oleo</a></p>
    <p><a href="?produto=Shampoo">Adicionar Shampoo</a></p>
    <p><a href="?produto=MyWay">Adicionar MyWay</a></p>
    <p><a href="?produto=Máscara de hidratação">Adicionar Máscara de hidratação</a></p>

    <h2>Produtos no Carrinho:</h2>
    <?php if (count($_SESSION['carrinho']) > 0): ?>
        <ul>
            <?php foreach ($_SESSION['carrinho'] as $item): ?>
                <li><?php echo $item; ?></li>
            <?php endforeach; ?>
        </ul>
        <p><a href="?limpar=true">Limpar carrinho</a></p>
    <?php else: ?>
        <p>Seu carrinho está vazio.</p>
    <?php endif; ?>
</body>
</html>