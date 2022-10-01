$(document).ready(function(){
    function filtrar_tabela(){
        $.get("../controller/filtrar_pessoa.php?filtro="+$("#filtro").val(),function(tabela){
            $("#tabela_pessoas").replaceWith(tabela) 
        })
    }
    $("#tabela_pessoas").ready(function(){
       filtrar_tabela()
    })
    $("#filtro").on("keydown keyup",function(){
        filtrar_tabela()
    })
})