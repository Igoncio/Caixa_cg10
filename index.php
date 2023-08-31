<?php
 
include_once('../Caixa_cg10/includes/menu.php');

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


    <form class="area-form">

        <h2 id="titulo-cad">Cadastro de Produto</h2>


        <div class="centraliza-form"> 
            <label for="produto">Produto</label>
                <div class="input">
                    <input type="name" name="name" placeholder="Name" type="Text">
                </div>

            <label for="preco">Preço</label>
                <div class="input">
                    <input type="preco" name="preco" placeholder="Preco" type="Float">
                </div>

            <div class="btn">
                <a href="comeco.php">
                    <button type="submit">Cadastrar</button>
                </a>
            </div>
            
        </div>    

    </form>




    
</body>
</html>