<?php
 
include_once('../includes/menu.php');




if(!empty($_GET['id'])){

    include_once('../app/config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM produtos WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0){

        while($user_data =  mysqli_fetch_assoc($result)){
            
            $nome = $user_data['nome'];
            $preco = $user_data['preco'];
            $quant = $user_data['quantidade'];

        }

    }
    else{
        header('Location: index.php');
    }

}


?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/editar.css">
    <title>Caixa</title>
</head>
<body>


    <form action="../app/salvarEdicao.php" method="POST" class="area-form">

        <h2 id="titulo-cad">Edição de Produto</h2>


        <div class="centraliza-form"> 

          
            <div class="group">
                <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" class="inputUser" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label id="label">Nome</label>
            </div>


            <div class="group">
                <input type="float" name="preco" id="preco" value="<?php echo $preco ?>" class="inputUser" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label id="label">Preço</label>
            </div>

            <div class="group">
                <input type="float" name="quantidade" id="quantidade" value="<?php echo $quant ?>" class="inputUser" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label id="label">Editar</label>
            </div>

            <div class="btn">
            
            <input type="submit" name="update" id="update" value="Salvar" class="update"> 
            </div>
            
        </div>    
        <input type="hidden" name="id" value="<?php echo $id ?>">

    </form>




    
</body>
</html>