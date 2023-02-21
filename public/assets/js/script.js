
console.log('coucou');
$(document).ready(function () {
    $('#dataTable').DataTable();
});



//  ENLEVE LE DISABLE DU FORM PROFILPATIENT

let button = document.querySelector('.triggerUdpdate');
let fieldset = document.querySelector('fieldset');

button.addEventListener('click', (event) => {
    console.log('oui');
    if (fieldset.hasAttribute('disabled')) {
        fieldset.removeAttribute('disabled');
    } else {
        fieldset.setAttribute('disabled', 'disabled');
    }
});


