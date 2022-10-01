function valida_pessoa(){
    return valida_nome($("#nome_pessoa").val()) && valida_cpf($("#cpf_pessoa").val()) && valida_telefone($("#telefone_pessoa").val()) && valida_dataNascimento($("#dataNascimento_pessoa").val()) && valida_genero($("#genero_pessoa"))
}

function valida_nome(nome){
    if(nome.trim() != ""){
        return true
    }else{
        $("#nome_pessoa").focus()
        $("#erro").text("Favor digitar um nome")
        return false
    }
}
function valida_cpf(cpf){
    regex = /^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/
    if(regex.test(cpf)){
        return true
    }else{
        $("#cpf_pessoa").focus()
        $("#erro").text("Cpf inválido")
        return false
    }
}
function valida_telefone(telefone){
    ddd = telefone.substring(0,4)
    regex = /^\([0-9]{2}\)$/
    if(regex.test(ddd) && telefone.length >=13){
        return true
    }else{
        $("#telefone_pessoa").focus()
        $("#erro").text("Número de telefone inválido")
        return false
    }
}
function valida_dataNascimento(data){
    dataAtual = new Date()
    dataNascimento = new Date(data)
    if(dataAtual > dataNascimento && dataNascimento.getFullYear() > 1894 && data.length == 10){
        return true
    }else{
        $("#dataNascimento_pessoa").focus()
        $("#erro").text("Data de Nascimento inválida")
        return false
    }
}
function valida_genero(){
    if($("input:radio[name='genero']").is(":checked")){
        return true
    }else{
        $("#erro").text("marque uma opção de gênero")
        return false
    }
}