<?php
include_once('../includes/menu.php');
include_once('../app/config.php');

// Função para obter a lista de produtos da tabela produtos
function getProdutos($conexao) {
    $select = "SELECT id, nome, preco FROM produtos"; 
    $result = $conexao->query($select);
    return $result->fetch_all(MYSQLI_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total = 0;
    for ($i = 1; $i <= 3; $i++) {
        $produtoId = $_POST["produto$i"];
        $quantidade = $_POST["quantidade$i"];
        $preco = $_POST["preco$i"];
        $subtotal = floatval($quantidade) * floatval($preco);
        $total += $subtotal;
    }

    // Processar o valor do troco aqui
    $valorPago = $_POST["valor_pago"];
    $troco = $valorPago - $total;
    
    // Inserir a quantidade dos produtos na tabela produtos
    for ($i = 1; $i <= 3; $i++) {
        $produtoId = $_POST["produto$i"];
        $quantidade = $_POST["quantidade$i"];
        
        // Atualizar a quantidade na tabela produtos
        $updateQuantidade = "UPDATE produtos SET quantidade = quantidade + ? WHERE id = ?";
        $stmtUpdate = $conexao->prepare($updateQuantidade);
        $stmtUpdate->bind_param("ii", $quantidade, $produtoId);
        $stmtUpdate->execute();
        $stmtUpdate->close();
    }
}

$produtos = getProdutos($conexao); // Obter a lista de produtos
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/caixa.css">
    <title>Calculadora de Preço</title>
</head>
<body>
    <form action="" method="post" class="area-conta">
        <?php for ($i = 1; $i <= 3; $i++) { ?>
            <div class="a<?=$i?>">
                <div class="dropdown">
                    <select name="produto<?=$i?>" class="option">
                        <?php foreach ($produtos as $produto) { ?>
                            <option value="<?=$produto['id']?>" data-preco="<?=$produto['preco']?>"><?=$produto['nome']?></option>
                        <?php } ?>
                    </select> 
                </div>

                <div class="quant">
                    <input type="number" name="quantidade<?=$i?>" class="inputUser" min="0" value="">
                </div>
                <input type="hidden" name="preco<?=$i?>" value="">
            </div>
        <?php } ?>

        <div>
            <div class="resultado">
                <label for="total">Total:</label>
                <span id="total">0.00</span>
            </div>
        </div>

        <!-- Campo de entrada para o valor pago -->
        <div>
            <label for="valor_pago">Valor Pago:</label>
            <input type="number" name="valor_pago" id="valor_pago" class="inputUser" min="0" step="0.01">
        </div>

        <!-- Campo de entrada para o troco -->
        <div>
            <label for="troco">Troco:</label>
            <input type="text" name="troco" id="troco" class="inputUser" value="0.00" readonly>
        </div>

        <div class="btn">
            <input type="submit" name="submit" id="submit" value="Enviar" class="submit">
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const calcularButton = document.getElementById("calcular");
            const valorPagoInput = document.getElementById("valor_pago");

            function calcularTotal() {
                let total = 0;
                for ($i = 1; $i <= 3; $i++) {
                    const produto = document.querySelector(`select[name=produto${$i}]`);
                    const quantidade = parseFloat(document.querySelector(`input[name=quantidade${$i}]`).value) || 0;
                    const preco = parseFloat(produto.options[produto.selectedIndex].getAttribute("data-preco"));
                    total += quantidade * preco;
                    document.querySelector(`input[name=preco${$i}]`).value = preco;
                }

                document.getElementById("total").textContent = total.toFixed(2);

                // Calcular e exibir o troco
                const valorPago = parseFloat(valorPagoInput.value) || 0;
                const troco = valorPago - total;
                document.getElementById("troco").value = troco.toFixed(2);
            }

            // Atualizar o total ao inserir valores nos campos de quantidade e valor pago
            for ($i = 1; $i <= 3; $i++) {
                const quantidadeInput = document.querySelector(`input[name=quantidade${$i}]`);
                quantidadeInput.addEventListener("input", calcularTotal);
            }

            valorPagoInput.addEventListener("input", calcularTotal);

            // Chamar calcularTotal para calcular o total automaticamente ao carregar a página
            calcularTotal();
        });
    </script>
</body>
</html>
