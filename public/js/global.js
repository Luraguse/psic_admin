$(document).on("click", ".add_comentario", function(){
    var pensamiento_id = $(this).data("id");
    $(".comentario_pensamiento, .submit_comentario").addClass("d-none");
    $("#form_comentario_"+pensamiento_id).removeClass("d-none");
});

$(document).on("keyup", ".input_comentario", function(){
    var comentario = $(this).val();
    var pensamiento_id = $(this).data("id");
    if(comentario.length > 6) {
        $("#submit_comentario_"+pensamiento_id).removeClass("d-none");
    } else {
        $("#submit_comentario_"+pensamiento_id).addClass("d-none");
    }
})


$(document).on("click", ".add_comentario_entrada", function(){

    var bitacora_id = $(this).data("id");
    $(".comentario_entrada, .submit_comentario").addClass("d-none");
    $("#form_comentario_bitacora_"+bitacora_id).removeClass("d-none");
});

$(document).on("keyup", ".input_comentario", function(){
    var comentario = $(this).val();
    var bitacora_id = $(this).data("id");
    if(comentario.length > 6) {
        $("#submit_comentario_bitacora_"+bitacora_id).removeClass("d-none");
    } else {
        $("#submit_comentario_bitacora_"+bitacora_id).addClass("d-none");
    }
})
