function verifica_form(){
    if($("#id_pessoa").val() == ""){
        $("#form_cadastro").attr("action","../controller/cadastrar_pessoa.php")
    }else{
        $("#form_cadastro").attr("action","../controller/alterar_pessoa.php")
    }
}
function alterar_pessoa(id){
    $.getJSON("../controller/select_pessoa.php?id="+id,function(pessoa){
        $("#titulo_modal").text("Alterar dados")
        $("#nome_pessoa").val(pessoa.nome)
        $("#cpf_pessoa").val(pessoa.cpf)
        $("#telefone_pessoa").val(pessoa.telefone)
        $("#dataNascimento_pessoa").val(pessoa.dataNascimento)
        $("#genero_pessoa_"+pessoa.genero).prop("checked","true")
        $("#id_pessoa").val(pessoa.id)
    })
}