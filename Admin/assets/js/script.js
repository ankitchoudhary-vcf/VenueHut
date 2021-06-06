var burger = document.getElementById("sidebarToggle");
var nav = document.getElementById(burger.dataset.target);

burger.addEventListener("click", ()=>{
    if(!(navbar.classList.contains("is-active")))
    {
        document.getElementsByClassName('sidebar')[0].style.width = '200px';
        document.getElementById('navbar').style.display = 'block';
    }
    else{
        
        document.getElementsByClassName('sidebar')[0].style.width = '100px';
        document.getElementById('navbar').style.display = 'none';
    }
    navbar.classList.toggle("is-active");
    burger.classList.toggle('rotate');

});