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
