<?php
 
include_once('../Caixa_cg10/includes/menu.php');




if(isset($_POST['submit'])){

    include_once('../Caixa_cg10/app/config.php');
    // print_r('Nome:' . $_POST['nome']);
    // print_r('Preço:' . $_POST['preco']);


    $nome = $_POST['nome'];
    $preco = $_POST['preco'];


    $result = mysqli_query(
        $conexao, 
        "INSERT INTO
        produtos(nome, preco)
        VALUES 
        ('$nome', '$preco')"
    );

}


?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Caixa_cg10/assets/css/cad.css">
    <title>Caixa</title>
</head>
<body>


    <form action="index.php" method="POST" class="area-form">

        <h2 id="titulo-cad">Cadastro de Produto</h2>


        <div class="centraliza-form"> 
            <label for="produto">Produto</label>
                <div class="input">
                <input type="text" name="nome" id="nome" class="inputUser" required>
 
                </div>

            <label for="preco">Preço</label>
                <div class="input">
                <input type="float" name="preco" id="preco"class="inputUser" required>
                </div>

            <div class="btn">
                
            <input type="submit" name="submit" id="submit">
                
            </div>
            
        </div>    

    </form>




    
</body>
</html>