<?php
$id = $_GET['id'];
echo $id;
$conn = new MySQLi("localhost","root","","estagio");
$query = "DELETE FROM tb_pessoas where id = $id;";
$conn->query($query);
mysqli_close($conn);
?>