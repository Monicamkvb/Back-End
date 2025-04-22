<?php
    include('db/conexao.php');
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receita</title>
</head>
<body>
    <header>
        <nav>
            <a href="index.php?menu=home">Home</a>
            <a href="index.php?menu=lista">Lista</a>
        </nav>
    </header>


    <main>
        <?php
        if(isset($_GET['menu'])){
           $pagina = $_GET['menu'];
        }else{
           $pagina = "home";
        }

          switch($pagina){
            case 'home';
                include("pages/home/home.php");
                break;
            case 'lista':
                include('pages/listaReceitas/listaReceita.php');
                break;
            case 'adicionarReceita';
                include('pages/listaReceitas/adicionarReceita.php');
                break;
            case 'dbAdicionarReceita';
                include('pages/listaReceitas/dbAdicionarReceita.php');
                break;
            case 'EditarReceita';
                include('pages/listaReceitas/editarReceita.php');
                break;
            case 'dbEditarReceita';
                include('pages/listaReceitas/dbEditarReceita.php');
                break;
            case 'deletarReceita';
                include('pages/listaReceitas/deletarReceita.php');
                break;
            default;
                include("pages/home/home.php");
                break;

          }
        ?>
    </main>
</body>
</html>