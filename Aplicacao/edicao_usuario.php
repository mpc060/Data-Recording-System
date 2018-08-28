<?php
    session_start();
    include('Server/server.php');
    $usuario = retornaUsuario($_GET['id']);
    //print_r ($usuario);
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
    <title> Cadastro de Usuário - Solid Sistema de Gestão </title>    
    
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
    <h1> Edição do Formulário de Usuário</h1>
    <br>
    <form method="POST" action="Server/cadastro_usuario_server.php">
       
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" id="nome" aria-describedby="emailHelp" placeholder="Entre com o nome" value="<?=$usuario['nome']?>">
            <small id="nome" class="form-text text-muted"></small>
        </div>
        
        <div class="form-group">
            <label for="idade">Idade</label>
            <input type="text" name="idade" class="form-control" id="idade" aria-describedby="emailHelp" placeholder="Entre com a idade" value="<?=$usuario['idade']?>">
            <small id="idade" class="form-text text-muted"></small>
        </div>
       
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" class="form-control" id="endereco" aria-describedby="emailHelp" placeholder="Entre com o endereço" value="<?=$usuario['endereco']?>">
            <small id="endereco" class="form-text text-muted"></small>
        </div>
        
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" class="form-control" id="cpf" aria-describedby="emailHelp" placeholder="Entre com o CPF" value="<?=$usuario['cpf']?>">
            <small id="cpf" class="form-text text-muted"></small>
        </div>
        
        <div class="form-group">
            <label for="rg">Documento de identidade</label>
            <input type="text" name="rg" class="form-control" id="rg" aria-describedby="emailHelp" placeholder="Entre com o documento de identidade" value="<?=$usuario['rg']?>">
            <small id="rg" class="form-text text-muted"></small>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entre com o endereço de email" value="<?=$usuario['email']?>">
            <small id="email" class="form-text text-muted"></small>
        </div>
        
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" class="form-control" id="telefone" aria-describedby="emailHelp" placeholder="Entre com o telefone" value="<?=$usuario['telefone']?>">
            <small id="telefone" class="form-text text-muted"></small>
        </div>
        
        <div class="form-check">
           
            <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="m" <?=($usuario['sexo']=='m')?'checked':''?>>
            <label class="form-check-label" for="sexo">
                Masculino
            </label>
        </div>
        
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="f" <?=($usuario['sexo']=='f')?'checked':''?>>
            <label class="form-check-label" for="sexo">
                Feminino
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="exampleRadios3" value="o" <?=($usuario['sexo']=='o')?'checked':''?>>
            <label class="form-check-label" for="sexo">
                Outro
            </label>
        </div>
        
        <br>
             
        <select class="custom-select" name="tipo_usuario_id">
            <option selected>Tipo do usuário</option>
            <option value="1" <?= ($usuario['tipo_usuario_id']=='1') ? 'selected' : '' ?>>Administrador</option>
            <option value="2" <?= ($usuario['tipo_usuario_id']=='2') ? 'selected' : '' ?>>Cliente</option>
            <option value="3" <?= ($usuario['tipo_usuario_id']=='3') ? 'selected' : '' ?>>Vendedor</option>
            <option value="4" <?= ($usuario['tipo_usuario_id']=='4') ? 'selected' : '' ?>>Fornecedor</option>
            <option value="5" <?= ($usuario['tipo_usuario_id']=='5') ? 'selected' : '' ?>>Funcionario</option>
        </select>
        
        <br>
        <br>
        
        <select class="custom-select" name="tipo_funcao_id">
           <option selected>Tipo do da função</option>
            <option value="1" <?= ($usuario['tipo_funcao_id']=='1') ? 'selected' : '' ?>>Operário</option>
            <option value="2" <?= ($usuario['tipo_funcao_id']=='2') ? 'selected' : '' ?>>Analista</option>
            <option value="3" <?= ($usuario['tipo_funcao_id']=='3') ? 'selected' : '' ?>>Administrador</option>
            <option value="4" <?= ($usuario['tipo_funcao_id']=='4') ? 'selected' : '' ?>>Contador</option>
        </select>
        
        <br>
        <br>
        
         <div class="form-group">
            <label for="senha">Senha</label>
            <input type="text" name="senha" class="form-control" id="senha" aria-describedby="emailHelp" placeholder="Entre com a senha" value="<?=$usuario['senha']?>">
            <br>
            <input type="text" name="senha" class="form-control" id="senha" aria-describedby="emailHelp" placeholder="Repita a senha">
            <small id="senha" class="form-text text-muted"></small>
        </div>
        
        <br>
           
        <div class="form-group">
            <label for="data_entrada"> Data de Entrada: </label>
            <input type="date" name="data_entrada" id="data_entrada" value="<?= date('Y-m-d', strtotime($usuario['data_entrada']))?>">
        </div>
        <div class="form-group">
            <label for="data_saida"> Data de Saída: </label>
            <input type="date" name="data_saida" id="data_saida" value="<?= date('Y-m-d', strtotime($usuario['data_saida']))?>">
        </div>
        
        <br>
        <div class="form-group">
            <input type="hidden" name="usuario_id" value="<?=$_GET["id"] ?>">
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
