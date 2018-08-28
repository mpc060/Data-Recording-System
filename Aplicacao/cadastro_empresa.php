<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <title> Cadastro de Empresas - Solid Sistema de Gestão </title>  
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css"/>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/default.min.css"/>    
    
    <style>
        html{
            font-family: sans-serif;  
            
        }
    
        h1{
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 30px;

            
        }
        form{
            padding-left: 30px;
            padding-right: 60px;
            
        }
        
        input{
              
        }
        
        h1{
            font-size: 50px;  
        }           
    </style> 
    
</head>
    
<body>
    <h1> Cadastro de Empresa </h1>
    
    
    <form method="POST" action="Server/cadastro_empresa_server.php">
        
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="nome" name="nome" class="form-control" id="nome" aria-describedby="emailHelp" placeholder="Entre com o nome">
            <small id="nome" class="form-text text-muted"></small>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entre com o email">
            <small id="email" class="form-text text-muted">Nós nunca vamos compartilhar seu e-mail com mais ninguém.</small>
        </div>
        
        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="cnpj" name="cnpj" class="form-control" id="cnpj" aria-describedby="emailHelp" placeholder="Entre com o CNPJ">
            <small id="cnpj" class="form-text text-muted"></small>
        </div>
        
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="endereco" name="endereco" class="form-control" id="endereco" aria-describedby="emailHelp" placeholder="Entre com o endereço">
            <small id="endereco" class="form-text text-muted"></small>
        </div>
        
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="telefone" name="telefone" class="form-control" id="telefone" aria-describedby="emailHelp" placeholder="Entre com o telefone">
            <small id="telefone" class="form-text text-muted"></small>
        </div>
        
        <div class="form-group">
            <input type="hidden" name="operacao" value="cadastro">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
        </div>
    
    </form> 
    
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
