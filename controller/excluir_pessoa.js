function excluir_pessoa(id){
    $.get("../controller/excluir_pessoa.php?id="+id,function(){
        $("#tr"+id).remove()
    })
}