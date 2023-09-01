<?php

    include_once("config.php");

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];



        $sqlUpdate = "UPDATE produtos SET nome='$nome', preco='$preco' WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);

    }
    header('Location: ../pages/produtos.php')



?>
