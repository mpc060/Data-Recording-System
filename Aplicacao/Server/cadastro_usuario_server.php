<?php
    session_start();
    include ('pdo_connect.php');
    $usuario = $_POST;
    $operacao = isset($usuario["operacao"]) ? $usuario["operacao"]: $_GET["operacao"];

    if($operacao == "cadastro") {
        try {
            criarUsuario($usuario);
            $_SESSION["status_form"] = "true";

        } catch(PDOException $e) {
            exit ($e);
            $_SESSION["status_form"] = "false";
        }   
        
        header( "Location: ../cadastro_usuario.php" );
    }else if($operacao == "edicao") {
        
        try {
            editarUsuario($usuario);
            $_SESSION["status_form"] = "true";
            header( "Location: ../usuarios.php" );        
        } catch(PDOException $e) {
            exit ($e);
            $_SESSION["status_form"] = "false";
            header( "Location: ../edicao_usuario.php?id=" . $usuario["usuario_id"] );                    
        }       
        
    }

    else if($operacao == 'exclusao'){
            try{
                removerUsuario($_GET["id"]);
                $_SESSION["status_form"] = "true";
            }catch (PDOException $e){
                $_SESSION["status_form"] = "false";  
            }
            
            header( "Location: ../usuarios.php" ); 
        }

    function criarUsuario($usuario){
        global $PDO;
        $stmt = $PDO->prepare("INSERT INTO usuario(nome, idade, endereco, cpf, rg, email, telefone, sexo, senha, data_entrada, data_saida, tipo_usuario_id, tipo_funcao_id)  
        VALUES (:nome, :idade, :endereco, :cpf, :rg, :email, :telefone, :sexo, :senha, :data_entrada, :data_saida, :tipo_usuario_id, :tipo_funcao_id)");
        
        $stmt->execute(array(
            ':nome' => $usuario["nome"],
            ':idade' => $usuario["idade"],
            ':endereco' => $usuario["endereco"],
            ':cpf' => $usuario["cpf"],
            ':rg' => $usuario["rg"],
            ':email' => $usuario["email"],
            ':telefone' => $usuario["telefone"],
            ':sexo' => $usuario["sexo"],
            ':senha' => $usuario["senha"],
            ':data_entrada' => $usuario["data_entrada"],
            ':data_saida' => $usuario["data_saida"],
            ':tipo_usuario_id' => $usuario["tipo_usuario_id"],
            ':tipo_funcao_id' => $usuario["tipo_funcao_id"], 
        ));
        
    }

    function editarUsuario($usuario){
        global $PDO;
        $stmt = $PDO->prepare("UPDATE usuario SET nome = :nome, idade = :idade, endereco = :endereco, cpf = :cpf, rg = :rg, email = :email, telefone = :telefone, sexo = :sexo, senha = :senha, data_entrada = :data_entrada, data_saida = :data_saida, tipo_usuario_id = :tipo_usuario_id, tipo_funcao_id = :tipo_funcao_id WHERE id = :id");
        
        $stmt->execute(array(
            ':id' => $usuario['usuario_id'],
            ':nome' => $usuario["nome"],
            ':idade' => $usuario["idade"],
            ':endereco' => $usuario["endereco"],
            ':cpf' => $usuario["cpf"],
            ':rg' => $usuario["rg"],
            ':email' => $usuario["email"],
            ':telefone' => $usuario["telefone"],
            ':sexo' => $usuario["sexo"],
            ':senha' => $usuario["senha"],
            ':data_entrada' => $usuario["data_entrada"],
            ':data_saida' => $usuario["data_saida"],
            ':tipo_usuario_id' => $usuario["tipo_usuario_id"],
            ':tipo_funcao_id' => $usuario["tipo_funcao_id"], 
        ));
        
    }

    function removerUsuario($usuario_id){
        global $PDO;
        
        $sql = 'DELETE FROM usuario WHERE id = :id';
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':id', $usuario_id); 
        $stmt->execute();
               
    }
 
?>
