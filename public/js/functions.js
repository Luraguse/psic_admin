function showToast(mensaje, tipo) {
    $(".toast").removeClass("text-bg-primary")
    $(".toast").removeClass("text-bg-success")
    $(".toast").removeClass("text-bg-danger")
    $(".toast").removeClass("text-bg-warning")
    $(".toast").removeClass("text-bg-info")

    $(".toast").addClass("text-bg-"+tipo);
    $(".toast-body").text(mensaje);
    $("#fechaToast").text(moment().format("YYYY-MM-DD hh:mm:ss"))
    const toastLive = document.getElementById('liveToast')
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLive)
    toastBootstrap.show()
}
