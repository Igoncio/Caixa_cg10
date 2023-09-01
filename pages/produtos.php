<?php
 

include_once('../includes/menu.php');
include_once('../app/config.php');

$sql = "SELECT * FROM produtos ORDER BY id ASC";

$result = $conexao->query($sql); 

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/produtos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <title>Produtos</title>
</head>
<body>

    <div class="geral">
        <table class="tabela">
            <thead>
                <tr>
                    <th class="coluna">ID</th>
                    <th class="coluna">Nome</th>
                    <th class="coluna">Preço</th>
                    <th class="coluna">Quantidade</th>
                    <th class="coluna">...</th> 
                </tr>
            </thead>
            <tbody class="tbela">
                <?php
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>" . $user_data['id'] . "</td>";
                        echo "<td>" . $user_data['nome'] . "</td>";             
                        echo "<td>" . $user_data['preco'] . "</td>";
                        echo "<td>" . $user_data['quantidade'] . "</td>";
                        echo "<td> 
                            <a href='../pages/editar.php?id=$user_data[id]'> 
                            <i class='bi bi-pencil-square'></i>
                            </a>

                            <a  href='../app/deletar.php?id=$user_data[id]'> 
                            <i class='bi bi-trash'></i>
                            </a>
                        </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>


</body>
</html>