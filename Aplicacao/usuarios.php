<?php
    session_start();
    include ("Server/server.php");
    $usuarios = retornaUsuarios();
    //echo json_encode($usuario);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuários - Solid Sistema de Gestão</title>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css"/>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/default.min.css"/>  
    <style>   
        html {
            font-family: sans-serif;
        }
        
        a {
            text-decoration: none;
            color: black;
        }
        
        a:hover {
            text-decoration: underline;
        }
        
        table {
          text-align: center;
          border-collapse: collapse;
          width: 50em;
          border: 1px solid #666;
          margin-left: 50px;
          margin-right: 50px;
          margin-bottom: 50px;
            
        }   
        
        tr {
          text-align: center;
            
        }
        
        tr:hover {
          text-align: center;
          background-color:#3d80df !important;
          color: #fff;
        }  
        
        tr:nth-child(even) {
            text-align: center;
            background-color: #edf5ff;
        }        
        
        th {
          font-weight: normal;
          text-align: left;
        }
        th, td {
          padding: 0.1em 1em;
        }   
        
        td:last-child {
            text-align: center;
        } 
        
        h1{
            padding-top: 30px;
            padding-left: 50px;
            font-size: 50px;  
        }
        
    </style>   
</head>
<body>
   
   <h1>Lista de Usuários</h1>
    
    <table border = "1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Idade</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Endereço</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Senha</th>
            <th>Data de Entrada</th>
            <th>Data de Saída</th>
            <th>ID Tipo do Usuário</th>
            <th>ID Tipo da Funcao</th> 
            <th>Operações</th>
        </tr>
        
        <br>
        <br>
           
        <?php foreach($usuarios as $usuario):?> 
        <tr>
            <td><?=$usuario["id"]?></td>        
            <td><?=$usuario["nome"]?></td>
            <td><?=$usuario["sexo"]?></td>
            <td><?=$usuario["idade"]?></td>
            <td><?=$usuario["cpf"]?></td>
            <td><?=$usuario["rg"]?></td>
            <td><?=$usuario["endereco"]?></td>
            <td><?=$usuario["email"]?></td>
            <td><?=$usuario["telefone"]?></td>
            <td><?=$usuario["senha"]?></td>
            <td><?=date_format(date_create($usuario["data_entrada"]),"d/m/Y")?></td>
            <td><?=date_format(date_create($usuario["data_saida"]),"d/m/Y")?></td>     
            <td><?=$usuario["tipo_usuario_id"]?></td>
            <td><?=$usuario["tipo_funcao_id"]?></td>
            <td>
                <a href="edicao_usuario.php?id=<?=$usuario['id']?>">Editar</a>
                <a href="Server/cadastro_usuario_server.php?id=<?=$usuario['id']?>&operacao=exclusao">Remover</a>
                                
            </td>
        </tr>
        <?php endforeach ?>     
        
    </table>
    
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>
    <script>
        <?php if($_SESSION['status_form'] == "true"): ?>
            <?php $_SESSION['status_form'] = "";  ?>
                alertify.alert("Sucesso!", "Operação realizada com sucesso!");
        
            <?php elseif($_SESSION['status_form'] == "false"): ?>
                <?php $_SESSION['status_form'] = "";  ?>
                    alertify.alert("Erro!", "A operação não foi realizada com sucesso. Por favor, tente novamente mais tarde.");
        <?php endif ?>
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>






















