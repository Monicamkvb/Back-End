<?php

//inicia sessão
session_start();

class Produto{
    public $id;
    public $nome;
    public $valor;
    public $desc;

    public function __construct($id,$nome,$valor,$desc){
        $this->id = $id;
        $this->nome = $nome;
        $this->valor = $valor;
        $this->desc = $desc;
    }
}

// public - qualquer parte do código mexe no atributo
// private - apenas o que está dentro do class

//verifica se algo está null
if (!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = [];
}
//adiciona um produto
if (isset($_GET['produto'])){
    $produtosDados = new Produto($_GET['id'],$_GET['produto'],$_GET['valor'],$_GET['desc']);
    $_SESSION['carrinho'][] = $produtosDados;
}

//limpar carrinho
if (isset($_GET['limparCarrinho'])){
    $_SESSION['carrinho'] = [];
}

//remover um item
if(isset($_GET['removerItem'])){
    foreach($_SESSION['carrinho'] as $id => $produto){
    if($produto->id == $_GET['removerItem']){
        unset($_SESSION['carrinho'][$id]);
        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
        }
    }
}

// var_dump($_SESSION['carrinho']);

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

    <p><a href="?id=1&produto='Óleo'&valor=39.99&desc='O óleo que vai transformar a sua pele'">Adicionar oleo</a></p>
    <p><a href="?id=2&produto=Shampoo&valor=60.00&desc='Shampoo Eudora, a salvação do seu cabelo'">Adicionar Shampoo</a></p>
    <p><a href="?id=3&produto=MyWay&valor=300.00&desc='O perfume mais sofisticado do mercado'">Adicionar MyWay</a></p>
    <p><a href="?id=4&produto=Máscaradehidratacao&valor=240.00&desc='Seu cabelo precisa de um milagre? Use nossa máscara'">Adicionar Máscara de hidratação</a></p>
    <p><a href="?limparCarrinho=True">Limpar carrinho</a></p>

    <?php
    $valorTotal = 0;
    foreach($_SESSION['carrinho'] as $produto){
        $valorTotal += $produto->valor;
    }

    if($valorTotal == 0){
        echo "O carrinho está vazio";
    }else{
        echo "O valor total R$ $valorTotal";
    }
    
    ?>

    <h2>Produtos no Carrinho:</h2>

    <ol>
        <?php
            // foreach(array as alias){}
            // foreach(filmes as filme){ film.nome , filme.desc}
            foreach($_SESSION['carrinho'] as $produto){
               echo "<li> 
                   <h1> $produto->nome </h1>
                   <p> R$ $produto->valor </p>
                   <p> $produto->desc </p>
                   <a href='?removerItem=$produto->id'> x </a>
                    </li>";
            }
      ?>
    </ol>
</body>
</html>