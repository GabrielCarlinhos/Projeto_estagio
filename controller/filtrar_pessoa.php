<?php
include("../model/pessoa.php");
$conn = new MySQLi("localhost","root","","estagio");
$filtro = $_GET["filtro"];
$query = "SELECT *,date_format(dataNascimento_pessoa,'%d/%m/%Y')as dataNascimento FROM tb_pessoas where nome_pessoa like '%$filtro%';";
$result = $conn->query($query);
$pessoas = array();
while($row = $result->fetch_assoc()){
  array_push($pessoas,new Pessoa($row['nome_pessoa'],$row['cpf_pessoa'],$row['telefone_pessoa'],$row['dataNascimento'],$row['genero_pessoa'],$row['id']));
}
echo "<table id='tabela_pessoas' class='table table-responsive-lg table-bordered border-dark'>
<tr>
<td>Nome</td>
<td>Cpf</td>
<td>Telefone</td>
<td>Data de nascimento</td>
<td>Genêro</td>
<td>Alterar</td>
<td>Excluir</td>
</tr>";
for($i = 0;$i<count($pessoas);$i++){
    $nome=$pessoas[$i]->nome;
    $cpf=$pessoas[$i]->cpf;
    $telefone=$pessoas[$i]->telefone;
    $dataNascimento=$pessoas[$i]->dataNascimento;
    $genero= $pessoas[$i]->genero == "M" ? "Masculino":($pessoas[$i]->genero == "F"?"Feminino":"Outros");
    $id= $pessoas[$i]->id;
    echo "<tr id='tr$id'>
    <td>$nome</td>
    <td>$cpf</td>
    <td>$telefone</td>
    <td>$dataNascimento</td>
    <td>$genero</td>
    <td onclick='alterar_pessoa($id)' data-bs-toggle='modal' data-bs-target='#modal-cadastro'><img src='../icones/alterar.png' width='50' height='30'></td>
    <td onclick='excluir_pessoa($id)'><img src ='../icones/excluir.png' width='50' height='30'></td>
    </tr>";
  }
  mysqli_close($conn);
?>