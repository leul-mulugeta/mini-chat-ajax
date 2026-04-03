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

// Mémorise le dernier message affiché pour ne pas recharger tout l'historique
let lastDisplayedId = 0;

setInterval(function () {
    $.getJSON("recuperer.php", function (response) {
        if (response.success) {
            const historique = $("#historique");

            // Créer les éléments HTML
            response.data.forEach((message) => {
                // Filtre pour n'ajouter que les messages que l'utilisateur n'a pas encore vus
                if (message.messageId > lastDisplayedId) {
                    const isMe = message.auteur === $("#pseudo").text().trim();

                    // Construit la bulle de message
                    const div = $("<div>").addClass("message").toggleClass("me", isMe);
                    const content = $("<p>").text(message.contenu);
                    const meta = $("<p>").text(`${message.auteur} - ${message.dateHeure}`);

                    historique.append(div.append(content, meta));
                    lastDisplayedId = message.messageId;

                    // Scrolle automatiquement vers le bas à chaque nouveau message
                    historique.scrollTop(historique[0].scrollHeight);
                }
            });
        } else {
            console.error("Erreur réseau ou serveur. Veuillez réessayer.");
        }
    }).fail(function () {
        console.error("Erreur de récupération des messages.");
    });
}, 2000);
