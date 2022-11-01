
function validaFormulario(){
    //alert('validacion de formulario');
    var sexo=document.getElementById("F");
    /*if (sexo.checked) {
        alert("Selecciono Femenino");
    }else{
        alert("Selecciono Masculino");
    }*/
    var fre=document.getElementsByName("frecuencia");
    /*for (var i = 0; i < fre.length; i++) {
        if(fre[i].checked){
            alert("Usted Selecciono:"+fre[i].value);
        }
    }*/
    var linea=document.getElementsByName("Linea[]");
    var contador=0;
    for (var i = 0; i < linea.length; i++) {
        if (linea[i].checked) {
            contador++;
        }
    }
    if (contador==0) {
        alert("debe seleccionar por lo menos una linea");
        return false;
    }
    //digito verificador del rut
    var rut=document.getElementById("txtRut").value;
    var mult=3;var suma=0;
    for (var i = 0; i < 10; i++) {
       var x=rut.substring(i,i+1);
        if (x!=".") {
            suma=suma+(x*mult);
            mult--;
            if (mult==1) {
                mult=7;
            }
            //alert("Numero:"+x+" , Suma:"+suma);    
        }        
    }
    var resto=suma % 11;
    var dv=11-resto;
    if (dv==10) {
        dv='K';
    }else if (dv==11) {
        dv=0;
    }
    var digito=rut.substring(11,12);
    if (dv==digito) {
        alert('rut correcto');
    }else{
        alert("rut incorrecto");
        return false;
    }
}

