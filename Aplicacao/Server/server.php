<?php
    include ("pdo_connect.php");
    function retornaUsuarios(){
        global $PDO;
        $sql = "SELECT * FROM usuario";
        $result = $PDO->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows; 
    }

    function retornaUsuario($user_id) {
        global $PDO;
        $sql = "SELECT * FROM usuario WHERE id = :usuario_id";
        $stmt = $PDO->prepare( $sql );
        $stmt->bindParam( ':usuario_id', $user_id );
        $result = $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }


    function retornaEmpresas(){
        global $PDO;
        $sql = "SELECT * FROM empresa";
        $result = $PDO->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function retornaEmpresa($user_id) {
        global $PDO;
        $sql = "SELECT * FROM empresa WHERE id = :empresa_id";
        $stmt = $PDO->prepare( $sql );
        $stmt->bindParam( ':empresa_id', $user_id );
        $result = $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }


    function retornaProdutos(){
        global $PDO;
        $sql = "SELECT * FROM produto";
        $result = $PDO->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function retornaProduto($user_id) {
        global $PDO;
        $sql = "SELECT * FROM produto WHERE id = :produto_id";
        $stmt = $PDO->prepare( $sql );
        $stmt->bindParam( ':produto_id', $user_id );
        $result = $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }


    function retornaServicos(){
        global $PDO;
        $sql = "SELECT * FROM servico";
        $result = $PDO->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function retornaServico($user_id) {
        global $PDO;
        $sql = "SELECT * FROM servico WHERE id = :servico_id";
        $stmt = $PDO->prepare( $sql );
        $stmt->bindParam( ':servico_id', $user_id );
        $result = $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }


?>