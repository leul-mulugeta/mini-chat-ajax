$("#message").keyup(function (event) {
    if (event.keyCode === 13) {
        enregistrer();
    }
});

function enregistrer() {
    const pseudo = $("#pseudo").val().trim();
    const message = $("#message").val().trim();

    // Validations
    if (pseudo.length < 2) {
        alert("Le pseudo doit contenir au moins 2 caractères.");
        return;
    }
    if (message.length === 0) {
        alert("Le message ne peut pas être vide.");
        return;
    }

    alert(`Message envoyé : ${message}`);
    $("#message").val("");
}
