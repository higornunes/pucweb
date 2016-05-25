<?php
    session_start();

    $qualProd = $_POST['prodCod'];
    $quantos = $_POST['quantos'];

    $_SESSION['produtos'][]=$qualProd;
    $_SESSION['quantidades'][]=$quantos;

    
     header('Location: ./produtosCarrinho.php');
?>