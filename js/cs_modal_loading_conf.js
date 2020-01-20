function showModal(card) {
    $("#" + card).show();
    $(".modal-loading").addClass("show");
}

function closeModal() {
    $(".modal-loading").removeClass("show");
    setTimeout(function () {
        $(".modal-loading .modal-card").hide();
    }, 300);
}

function loading(status, tag) {
    if (status) {
        $("#loading .tag").text(tag);
        showModal("loading");
    } else {
        closeModal();
    }
}