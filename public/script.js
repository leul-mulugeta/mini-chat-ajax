$("#message").keyup(function (event) {
    if (event.keyCode === 13) {
        enregistrer();
    }
});

function enregistrer() {
    const message = $("#message").val().trim();

    // Validations
    if (message.length === 0) {
        alert("Le message ne peut pas être vide.");
        return;
    }

    alert(`Message envoyé : ${message}`);
    $("#message").val("");
}
