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

        }

    }
    else{
        header('Location: index.php');
    }

}


?> 
