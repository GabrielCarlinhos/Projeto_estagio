<?php
include("../model/pessoa.php");
$pessoa = new Pessoa($_POST["nome"],$_POST["cpf"],$_POST["telefone"],$_POST["dataNascimento"],$_POST["genero"]);
$conn = new MySQLi("localhost","root","","estagio");
$query = "INSERT INTO tb_pessoas(nome_pessoa,cpf_pessoa,telefone_pessoa,dataNascimento_pessoa,genero_pessoa)
values('$pessoa->nome','$pessoa->cpf','$pessoa->telefone','$pessoa->dataNascimento','$pessoa->genero');";
$conn->query($query);
header("Location:../view/index.php")
?>