<?php
require("../model/pessoa.php");
$conn = new MySQLi("localhost","root","","estagio");
$pessoa = new Pessoa($_POST["nome"],$_POST["cpf"],$_POST["telefone"],$_POST["dataNascimento"],$_POST["genero"],$_POST["id"]);
$query = "UPDATE tb_pessoas set nome_pessoa = '$pessoa->nome', cpf_pessoa = '$pessoa->cpf', telefone_pessoa = '$pessoa->telefone', dataNascimento_pessoa = '$pessoa->dataNascimento',
genero_pessoa = '$pessoa->genero' where id = $pessoa->id;";
$conn->query($query);
header("Location:../view/index.php");

?>