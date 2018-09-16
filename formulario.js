$("#formulario").submit(function(event){
    event.preventDefault();//almacena datos sin refrescar
    var formData = new FormData(document.getElementById("formulario"));
    formData.append("clave", "valor");
    enviar(formData);
});

function enviar(formData){

    $.ajax({
        url:"procesador.php",
        dataType:"html",
        data:formData,
        type:"post",
        cache:false,
        contentType:false,
        processData:false,
        success:function(res){
            if (res=="exito") exito(res);
            else error(res);
        }
    });
}

function exito(texto){
    console.log(texto);
    $("#msgExito").removeClass("d-none");
    $("#msgError").addClass("d-none");

}
function error(texto){
    console.log(texto);
    $("#msgError").removeClass("d-none");
    $("#msgError").html(texto);
}



