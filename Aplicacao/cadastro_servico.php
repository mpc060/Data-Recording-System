<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Cadastro de Serviço - Solid Sistema de Gestão </title>  
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
    <h1> Cadastro de Serviço </h1>
  
    <form method="POST" action="Server/cadastro_servico_server.php">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" id="inputnome" placeholder="Digite o nome do serviço">
        </div>
        <div class="form-group">
            <label for="descricao">Descricao</label>
            <input type="text" name="descricao" class="form-control" id="inputdescricao" placeholder="Digite a descrição do serviço">
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
