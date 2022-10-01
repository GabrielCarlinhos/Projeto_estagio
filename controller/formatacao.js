function valida_caractere(e,formato){
    char = String.fromCharCode(e.charCode)
    return char.match(formato)
}
function limpa_form(){
    $('#form_cadastro').trigger('reset')
    $('#titulo_modal').text('Cadastrar pessoa')
    $("#id_pessoa").val("")
}
$(document).ready(function(){
    $("#nome_pessoa").keypress(function(e){
        if(!valida_caractere(e,"[a-z,A-Zá-úÁ-Ú ]")){
            e.preventDefault()
        }
    })
    $("#cpf_pessoa").keypress(function(e){
        if(!valida_caractere(e,"[0-9]")){
            e.preventDefault()
        }
        if($("#cpf_pessoa").val().length == 3 || $("#cpf_pessoa").val().length == 7){
            $("#cpf_pessoa").val($("#cpf_pessoa").val()+".")
        }
        if($("#cpf_pessoa").val().length == 11){
            $("#cpf_pessoa").val($("#cpf_pessoa").val()+"-")
        }
    })
    $("#telefone_pessoa").on("click focus keyup keydown",function(){
        if($("#telefone_pessoa").val().length == 0){
            $("#telefone_pessoa").val("(")
        }
        $("#telefone_pessoa").keypress(function(e){
            if(!valida_caractere(e,"[0-9]")){
                e.preventDefault()
            }
            if($("#telefone_pessoa").val().length == 3)
                $("#telefone_pessoa").val($("#telefone_pessoa").val()+")")
        })
    })
})