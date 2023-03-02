
$(document).ready(function () {
    $('#dataTable').DataTable({
        language: {
            processing: "Traitement en cours...",
            search: "Rechercher&nbsp;:",
            lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
            info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix: "",
            loadingRecords: "Chargement en cours...",
            zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable: "Aucun patient ou rendez-vous enregistré",
            paginate: {
                first: "Premier",
                previous: "Pr&eacute;c&eacute;dent",
                next: "Suivant",
                last: "Dernier"
            },
            aria: {
                sortAscending: ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    }
    );
});




//  JQUERY LIVE SEARCH

$(document).ready(function () {
    $("#live_search").keyup(function () {
        setTimeout(() => {
            // For data-set 
            let trashes = document.querySelectorAll('.deleteApt');
            console.log(trashes);
            for (let trash of trashes) {
                trash.addEventListener('click', persoModal)
            }
            function persoModal() {
                // Attributs data
                let id = this.dataset.id;
                let name = this.dataset.name;
                console.log(name);

                // Injection in modal
                document.querySelector("#livesearchModal .fullname").innerText = name;
                let link = document.querySelector("#linkDelete");
                let href = link.getAttribute('href');
                link.setAttribute('href', href + id)
            }
        }, 300);


        // inputseatch
        let input = $(this).val();
        if (input != "") {

            $.ajax({
                url: "/../config/livesearch.php",
                method: "GET",
                data: { input: input },

                success: function (data) {
                    $('#searchresult').html(data);
                    $('#searchresult').css("display", "block");
                }
            });
        } else {
            // Si input vide caché la div
            $('#searchresult').css("display", "none");
        }
    })
});


// Récupération des data-set 
let trashes = document.querySelectorAll('.deleteApt');
for (let trash of trashes) {
    trash.addEventListener('click', persoModal)
}
function persoModal() {
    // Attributs data
    let id = this.dataset.id;
    let name = this.dataset.name;

    // Injection in modal
    document.querySelector("#validateModal .fullname").innerText = name;
    let link = document.querySelector("#linkDelete");
    let href = link.getAttribute('href');
    link.setAttribute('href', href + id)
}





//  ENLEVE LE DISABLE DU FORM PROFILPATIENT

let button = document.querySelector('.triggerUdpdate');
let fieldset = document.querySelector('fieldset');

button.addEventListener('click', (event) => {
    if (fieldset.hasAttribute('disabled')) {
        fieldset.removeAttribute('disabled');
    } else {
        fieldset.setAttribute('disabled', 'disabled');
    }
});


