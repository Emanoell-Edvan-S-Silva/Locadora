function mascara_cel(){
    var cel = document.getElementById('cel')
    if(cel.value.length == 1){
        cel.value = "(" + cel.value
    }
    else if(cel.value.length == 3){
        cel.value += ") "
    }
    else if(cel.value.length == 10){
        cel.value += "-"
    }
    }
    function mascara_cpf(){
        var cpf = document.getElementById('cpf')
        if(cpf.value.length == 3 || cpf.value.length == 7){
            cpf.value += ".";
        }
        else if(cpf.value.length == 11){
            cpf.value += "-"
        }
    }
    