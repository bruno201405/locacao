<?php

    session_start();

    $localhost = "localhost";
    $user = "root";
    $password = "";
    $banco = "locacaocarros";

    global $pdo;
    try{

        $pdo = new PDO("mysql:dbname=".$banco.";charset=utf8;host=".$localhost, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        echo "ERRO DB: ".$e->getMessage();
        exit;

    }catch(Exception $e){
        echo "ERRO genérico: ".$e->getMessage();
        exit;
    }
    
?>