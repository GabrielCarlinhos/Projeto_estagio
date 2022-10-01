<?php 
class Pessoa{
    function __construct($nome,$cpf,$telefone,$dataNascimento,$genero,$id=NULL){
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->dataNascimento = $dataNascimento;
        $this->genero = $genero;
        $this->id = $id;
    }
    
}
?>