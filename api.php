<?php
//Gerar os números aleatórios.
    $gerarAleatorio = rand(1, 100);
    echo json_encode(['numero_sorteado' => $gerarAleatorio]);
?>
