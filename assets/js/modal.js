
/**-----------------------------------------------------------------------------------------*
 *                  Bulma Modal Js Toggling Control                                         *
 * ---------------------------------------------------------------------------------------**/



// it selects all the modal buttons
var btn = document.getElementsByClassName("modal-button");

for (let i = 0; i < btn.length; i++) {

    // select all the modals which are targeted by the modal button
    var modal = document.getElementById(btn[i].dataset.target);
    try {

        // toggler the class is-active class in modal
        btn[i].addEventListener("click", (e) => {
            modal = document.getElementById(btn[i].dataset.target);
            modal.classList.toggle("is-active")
            if(btn[i].dataset.id)
            {
               let venue = modal.getElementsByClassName('VenueId');
               venue[0].value = btn[i].dataset.id;
            }
        })

        // toggler the class is-active class in modal to close the modal
        modal.firstElementChild.addEventListener("click", (e) => {
            modal.classList.remove("is-active")
        })

        // toggler the class is-active class in modal to close the modal
        // all the close class in the model are selected
        for (let j = 0; j < modal.getElementsByClassName('close').length; j++) {
            modal.getElementsByClassName('close')[j].addEventListener('click', (e) => {
                modal.classList.remove("is-active")
            })
        }
    }
    catch (err) {
        console.log(err)
    }
}
