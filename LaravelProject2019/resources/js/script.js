function myFunction(){
    document.getElementById("drop-down").classList.toggle("show");
}

window.onclick = function(event) {
    if(!event.target.matches('.drop-button')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i= 0; i < dropdowns.length; i++) {
            var openDropdown = drowpdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classlist.remove('show');
            }
        }
    }
}