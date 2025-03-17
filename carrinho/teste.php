<?php
    session_start();

    if(isset( $_SESSION['carrinho'])){
        $_SESSION['carrinho'] = [];
    }
?>

<!DOCTYPE html>
<html lang="pt-br ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="?produto = SSD">Adicionar SSD</a>

    <ol>
        <?php
            // foreach(array as alias){}
            // foreach(filmes as filme){ film.nome , filme.desc}
            foreach($_SESSION['carrinho'] as $produto){
               echo "<li> $produto </li>";

            }
      ?>
    </ol>
</body>
</html>