$("#message").keyup(function (event) {
    if (event.keyCode === 13) {
        enregistrer();
    }
});

function enregistrer() {
    const btn = $("#btn-enregistrer");
    const pseudo = $("#pseudo")[0].innerText;
    const message = $("#message").val().trim();

    // Validations
    if (pseudo.length === 0) {
        alert("Le pseudo ne peut pas être vide.");
        return;
    }

    if (pseudo.length > 50) {
        alert("Le pseudo ne peut pas dépasser 50 caractères.");
        return;
    }

    if (message.length === 0) {
        alert("Le message ne peut pas être vide.");
        return;
    }

    if (message.length > 3000) {
        alert("Le message ne peut pas dépasser 3000 caractères.");
        return;
    }

    // Désactiver le bouton pour éviter les doublons
    btn.prop("disabled", true).text("Envoi en cours...");

    $.post(
        "enregistrer.php",
        { auteur: pseudo, message: message },
        function (response) {
            if (response.success) {
                alert("Message envoyé.");
                $("#message").val("");
            } else {
                alert("Erreur réseau ou serveur. Veuillez réessayer.");
            }
        },
        "json",
    )
        .fail(function () {
            alert("Erreur réseau ou serveur. Veuillez réessayer.");
        })
        .always(function () {
            btn.prop("disabled", false).text("Envoyer");
        });
}
