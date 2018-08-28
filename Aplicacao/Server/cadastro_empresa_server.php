<?php
    session_start();
    include ('pdo_connect.php');
    $empresa = $_POST;
    $operacao = isset($empresa["operacao"]) ? $empresa["operacao"]: $_GET["operacao"];

    if($operacao == "cadastro") {
        try {
            criarEmpresa($empresa);
            $_SESSION["status_form"] = "true";

        } catch(PDOException $e) {
             exit($e);
            $_SESSION["status_form"] = "false";
        }   
        
        header( "Location: ../cadastro_empresa.php" );
    }else if($operacao == "edicao") {
        
        try {
            editarEmpresa($empresa);
            $_SESSION["status_form"] = "true";
            header( "Location: ../empresas.php" );        
        } catch(PDOException $e) {
            exit ($e);
            $_SESSION["status_form"] = "false";
            header( "Location: ../edicao_empresa.php?id=" . $empresa["empresa_id"] );                    
        }       
        
    }

    else if($operacao == 'exclusao'){
            try{
                removerEmpresa($_GET["id"]);
                $_SESSION["status_form"] = "true";
            }catch (PDOException $e){
                $_SESSION["status_form"] = "false";  
            }
            
            header( "Location: ../empresas.php" ); 
        }

    function criarEmpresa($empresa){
        global $PDO;
        $stmt = $PDO->prepare("INSERT INTO empresa(nome, endereco, cnpj, email, telefone, usuario_id)  
        VALUES (:nome, :endereco, :cnpj, :email, :telefone, :usuario_id )");
        
        $stmt->execute(array(
            ':usuario_id' => 10,
            ':nome' => $empresa["nome"],
            ':endereco' =>$empresa["endereco"],
            ':cnpj' =>$empresa["cnpj"],
            ':email' =>$empresa["email"],
            ':telefone' =>$empresa["telefone"],
        ));
        
    }

    function editarEmpresa($empresa){
        global $PDO;
        $stmt = $PDO->prepare("UPDATE empresa SET nome = :nome, endereco = :endereco, cnpj = :cnpj, email = :email, telefone = :telefone WHERE id = :id");
        
        $stmt->execute(array(
            ':id' => $empresa['empresa_id'],
            ':nome' => $empresa["nome"],
            ':endereco' =>$empresa["endereco"],
            ':cnpj' =>$empresa["cnpj"],
            ':email' =>$empresa["email"],
            ':telefone' =>$empresa["telefone"],
        ));
        
    }

    function removerEmpresa($empresa_id){
        global $PDO;
        
        $sql = 'DELETE FROM empresa WHERE id = :id';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':id', $empresa_id); 
        $stmt->execute();
               
    }

?>
