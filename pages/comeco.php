<?php
 
 include_once('../includes/menu.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/caixa.css">
    <title>Caixa</title>
</head>
<body>


<button onclick="soma()">Fanta</button>
    <button onclick="soma()">Vodka</button>

    <button onclick="soma()">Tang</button>

    <button onclick="soma()">suco</button>
    <p id="fantaEscolha"></p>
    <p id="vodkaEscolha"></p>
    <p id="vodkaEscolha"></p>
    <p id="vodkaEscolha"></p>

</body>

<script>

var total = 0
var fanta = 0
var vodka = 0
var tang = 0
var suco = 0

const vodkaEscolha = document.getElementById("vodkaEscolha")
function soma(preco,escolha){

    total += preco
    console.log(total)
    if(escolha == 1){

        fanta = fanta + 1

    }
    if(escolha == 2){
        vodka += 1
    }
    if(escolha == 3){
        tang += 1
    }
    if(escolha == 4){
        suco += 1
    }

    console.log("fanta "+ fanta)
    console.log("vodka "+ vodka)
    console.log("tang "+ tang)
    console.log("suco "+ suco)
    vodkaEscolha.innerHTML = "Vodka = "+vodka 

}

</body>
</html>