<?php

    include_once("config.php");

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quant = $_POST['quantidade'];



        $sqlUpdate = "UPDATE produtos SET nome='$nome', preco='$preco', quantidade='$quant' WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);

    }
    header('Location: ../pages/produtos.php')



?>
