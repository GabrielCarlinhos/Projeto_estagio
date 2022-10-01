<?php
require("../model/pessoa.php");
$id = $_GET["id"];
$conn = new MySQLi("localhost","root","","estagio");
$query = "SELECT * FROM tb_pessoas where id=$id;";
$result = $conn->query($query);
while($row = $result->fetch_assoc()){
    $pessoa = new Pessoa($row["nome_pessoa"],$row["cpf_pessoa"],$row["telefone_pessoa"],$row["dataNascimento_pessoa"],$row["genero_pessoa"],$id);
}
header("Content-Type: application/json");
echo json_encode($pessoa);
mysqli_close($conn);
?>