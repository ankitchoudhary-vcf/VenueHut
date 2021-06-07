// message controls
var messages = document.getElementsByClassName('message');

for(let i = 0; i < messages.length; i++){
    try {

        // It just accepts the first delete button in the message
        messages[i].getElementsByClassName('delete')[0].addEventListener('click', (e)=>{
            messages[i].style.display = 'none';
        })
    } catch (err) {
        console.log(err);
    }
}