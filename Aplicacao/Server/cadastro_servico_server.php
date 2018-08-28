<?php
    session_start();
    include ('pdo_connect.php');
    $servico = $_POST;
    $operacao = isset($servico["operacao"]) ? $servico["operacao"]: $_GET["operacao"];

    if($operacao == "cadastro") {
        try {
            criarServico($servico);
            $_SESSION["status_form"] = "true";

        } catch(PDOException $e) {
            exit ($e);
            $_SESSION["status_form"] = "false";
        }   
        
        header( "Location: ../cadastro_servico.php" );
    }else if($operacao == "edicao") {
        
        try {
            editarServico($servico);
            $_SESSION["status_form"] = "true";
            header( "Location: ../servicos.php" );        
        } catch(PDOException $e) {
            exit ($e);
            $_SESSION["status_form"] = "false";
            header( "Location: ../edicao_servico.php?id=" . $servico["servico_id"] );                    
        }       
        
    }

    else if($operacao == 'exclusao'){
            try{
                removerServico($_GET["id"]);
                $_SESSION["status_form"] = "true";
            }catch (PDOException $e){
                $_SESSION["status_form"] = "false";  
            }
            
            header( "Location: ../servicos.php" ); 
        }

    function criarServico($servico){
        global $PDO;
        $stmt = $PDO->prepare("INSERT INTO servico(nome, descricao, usuario_id)  
        VALUES (:nome, :descricao, :usuario_id )");
        
        $stmt->execute(array(
            ':usuario_id' => 7,
            ':nome' => $servico["nome"],
            ':descricao' =>$servico["descricao"],
        ));
        
    }

    function editarServico($servico){
        global $PDO;
        $stmt = $PDO->prepare("UPDATE servico SET nome = :nome, descricao = :descricao WHERE id = :id");
        
        $stmt->execute(array(
            ':id' => $servico['servico_id'],
            ':nome' => $servico["nome"],
            ':descricao' =>$servico["descricao"],
        ));
        
    }

    function removerServico($servico_id){
        global $PDO;
        
        $sql = 'DELETE FROM servico WHERE id = :id';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':id', $servico_id); 
        $stmt->execute();
               
    }

?>
