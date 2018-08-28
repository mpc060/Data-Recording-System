<?php
    session_start();
    include ('pdo_connect.php');
    $produto = $_POST;
    $operacao = isset($produto["operacao"]) ? $produto["operacao"]: $_GET["operacao"];

    if($operacao == "cadastro") {
        try {
            criarProduto($produto);
            $_SESSION["status_form"] = "true";

        } catch(PDOException $e) {
            exit ($e);
            $_SESSION["status_form"] = "false";
        }   
        
        header( "Location: ../cadastro_produto.php" );
    }else if($operacao == "edicao") {
        
        try {
            editarProduto($produto);
            $_SESSION["status_form"] = "true";
            header( "Location: ../produtos.php" );        
        } catch(PDOException $e) {
            exit ($e);
            $_SESSION["status_form"] = "false";
            header( "Location: ../edicao_produto.php?id=" . $produto["produto_id"] );                    
        }       
        
    }

    else if($operacao == 'exclusao'){
            try{
                removerProduto($_GET["id"]);
                $_SESSION["status_form"] = "true";
            }catch (PDOException $e){
                $_SESSION["status_form"] = "false";  
            }
            
            header( "Location: ../produtos.php" ); 
        }

    function criarProduto($produto){
        global $PDO;
        $stmt = $PDO->prepare("INSERT INTO produto(nome, preco, validade, descricao, lote, data_fabricacao, usuario_id)  
        VALUES (:nome, :preco, :validade, :descricao, :lote, :data_fabricacao, :usuario_id )");
        
        $stmt->execute(array(
            ':usuario_id' => 10,
            ':nome' => $produto["nome"],
            ':preco' =>$produto["preco"],
            ':validade' =>$produto["validade"],
            ':descricao' =>$produto["descricao"],
            ':lote' =>$produto["lote"],
            ':data_fabricacao' =>$produto["data_fabricacao"],
        ));
        
    }

    function editarProduto($produto){
        global $PDO;
        $stmt = $PDO->prepare("UPDATE produto SET nome = :nome, preco = :preco, validade = :validade, descricao = :descricao, lote = :lote, data_fabricacao = :data_fabricacao WHERE id = :id");
        
        $stmt->execute(array(
            ':id' => $produto['produto_id'],
            ':nome' => $produto["nome"],
            ':preco' =>$produto["preco"],
            ':validade' =>$produto["validade"],
            ':descricao' =>$produto["descricao"],
            ':lote' =>$produto["lote"],
            ':data_fabricacao' =>$produto["data_fabricacao"],
        ));
        
    }

    function removerProduto($produto_id){
        global $PDO;
        
        $sql = 'DELETE FROM produto WHERE id = :id';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':id', $produto_id); 
        $stmt->execute();
               
    }

?>
