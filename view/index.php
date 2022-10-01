<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../jquery/jquery.js"></script>
    <script src="../controller/formatacao.js"></script>
    <script src="../model/validacao.js"></script>
    <script src="../controller/excluir_pessoa.js"></script>
    <script src="../controller/alterar_pessoa.js"></script>
    <script src="../controller/filtrar_pessoa.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
<?php
$conn = new MySQLi("localhost","root","");
$query = "create database if not exists estagio;";
$conn->query($query);
$query = "use estagio";
$conn->query($query);
$query = "create table if not exists tb_pessoas(
id int not null auto_increment,
nome_pessoa varchar(45) not null,
cpf_pessoa varchar(14) not null,
telefone_pessoa varchar(13) not null,
dataNascimento_pessoa Date,
genero_pessoa enum('M','F','outros'),

constraint pk_pessoa primary key(id)
);";
$conn->query($query);

mysqli_close($conn);
?>
<div class="modal" id="modal-cadastro" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo_modal">Cadastrar pessoa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" autocomplete="off" id="form_cadastro" action="../controller/cadastrar_pessoa.php" onSubmit="return valida_pessoa()">
            <input type="hidden" id="id_pessoa" name="id">
            <label for="nome">Nome:</label>
            <input type="text" id="nome_pessoa" name="nome" class="input_pessoa" placeholder="Digite seu nome" maxlength="45">
            <label for="cpf">Cpf:</label>
            <input type="text" id="cpf_pessoa" name="cpf" class="input_pessoa" placeholder="Digite seu cpf" maxlength="14">
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone_pessoa" name="telefone" class="input_pessoa" placeholder="Digite o número do seu telefone" maxlength="13">
            <label for="dataNascimento">Data de nascimento:</label>
            <input type="date" id="dataNascimento_pessoa" class="input_pessoa" name="dataNascimento">
            <label for="genero">Genêro:</label>
            <input type="radio" id="genero_pessoa_M" name="genero" value="M">
            <label for="genero">Masculino</label>
            <input type="radio" id="genero_pessoa_F" name="genero" value="F">
            <label for="genero">Feminino</label>
            <input type="radio" id="genero_pessoa_outros" name="genero" value="outros">            
            <label for="genero">Outros</label>
      </div>
      <div class="modal-footer">
        <div id="erro"></div>
        <button type="submit" onclick="verifica_form()" class="btn btn-success">Confirmar</button>
        <button type="reset" class="btn btn-danger">Limpar</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <div class="content">
      <h1 class="titulo">Cadastro de pessoas</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-cadastro" onclick="limpa_form()">Cadastrar</button>
        <input type="text" id="filtro" name="filtro" placeholder="Buscar por nome">

        <div id="table_holder">
        <table id="tabela_pessoas" class="table table-responsive-lg table-bordered border-dark">
        

</table>
</div>
</div>
</body>
</html>