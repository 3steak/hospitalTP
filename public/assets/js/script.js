
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
            for (let trash of trashes) {
                trash.addEventListener('click', persoModal)
            }
            function persoModal() {
                // Attributs data
                let id = this.dataset.id;
                let name = this.dataset.name;

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
                    let html = `<table class="table table-bordered table-striped mt-4 neumorphic">
                                    <thead>
                                            <tr class="">
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Date</th>
                                                <th>Heure</th>
                                                <th>Actions</th>
                                            </tr>
                                    </thead>
                                    <tbody>`

                    if (data) {
                        appointments = JSON.parse(data);

                        jQuery.each(appointments, function (key, appointment) {
                            let date = new Date(appointment.dateHour);
                            let year = date.getFullYear();
                            let month = date.getMonth() + 1;
                            month = month < 10 ? '0' + month : month;
                            let day = date.getDate();
                            day = day < 10 ? '0' + day : day;

                            let hour = date.getHours();
                            let minute = date.getMinutes();
                            minute = minute < 10 ? '0' + minute : minute;

                            html += `
                                    <tr>
                                        <td>${appointment.lastname} </td>
                                        <td>${appointment.firstname}</td>
                                        <td class="">${day} / ${month} / ${year}</td>
                                        <td class="">${hour} : ${minute}</td>
                                        <td><a class="m-1 seeProfil" title="Accéder au rendez-vous" href="/controllers/appointmentCtrl.php?id=${appointment.id}"><i class="fa-regular fa-eye"></i></a>
                                            <a class="m-1 deleteApt" title="Supprimer le rendez-vous" data-bs-toggle="modal" data-bs-target="#livesearchModal" data-name="${appointment.lastname} ${appointment.firstname}" data-id="${appointment.id}">
                                                <i class="fa-regular fa-trash-can m-1"></i>
                                        </td>
                                    </tr>
                                    `

                        })
                        html += `</tbody>
                                        </table >
                                        <div class="modal fade" id="livesearchModal" tabindex="-1" aria-labelledby="validateModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="validateModalLabel">Suppression du rendez-vous</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    Supprimer le rendez-vous de <span class="fullname"></span> ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a class="btn btn-primary" id="linkDelete" href="/DeleteAppointment?id=" role="button">Supprimer</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`
                    } else {
                        html += `<h6 class='text-danger texte-center mt-3'>NO DATA FOUND</h6>`;
                    }
                    $('#searchresult').html(html);

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




