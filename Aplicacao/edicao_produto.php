<?php
    session_start();
    include('Server/server.php');
    $produto = retornaProduto($_GET['id']);
    //print_r ($produto);
?>

<!DOCTYPE html>
<html>
    
<head>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css"/>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/default.min.css"/>  
    <title> Cadastro de Produtos - Solid Sistema de Gestão </title>   
    
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
    <h1> Edição do Formulário de Produto </h1>
    <br>
    <form method="POST" action="Server/cadastro_produto_server.php">
         <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Nome</label>
              <input type="text" name="nome" class="form-control" id="inputnome" placeholder="Digite o nome" value="<?=$produto['nome']?>">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Preço</label>
              <input type="text" name="preco" class="form-control" id="inputpreco" placeholder="Digite o valor" value="<?=$produto['preco']?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Validade</label>
            <input type="text" name="validade" class="form-control" id="inputvalidade" placeholder="Digite a validade" value="<?=$produto['validade']?>">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Descricao</label>
            <input type="text" name="descricao" class="form-control" id="inputdescricao" placeholder="Digite a descrição do item" value="<?=$produto['descricao']?>">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Lote</label>
              <input type="text" name="lote" class="form-control" id="inputlote" placeholder="Digite o lote" value="<?=$produto['lote']?>">
            </div>
    
            <div class="form-group col-md-6">
              <label for="inputCity">Data de Fabricação</label>
              <input type="text" name="data_fabricacao" class="form-control" id="inputdata_fabricacao" placeholder="0000-00-00" value="<?=$produto['data_fabricacao']?>">
            </div>
        </div>
        <div class="form-group">
            <input type="hidden" name="produto_id" value="<?=$_GET["id"] ?>">    
            <input type="hidden" name="operacao" value="edicao">
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