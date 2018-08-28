<?php
    //PDO promove uma padronização da forma com que o PHP se comunica com o banco de dados relacional
    try{
        $PDO = new PDO ("mysql:host=localhost;dbname=cooperativa" , "root", "");
        $PDO->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $PDO->exec("set names utf8");
        //echo "Conectado com sucesso!";
    }catch(PDOException $e){
        echo "Erro ao conectar!". $e;
    }
?>