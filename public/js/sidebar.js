const hmbrgrDiv = document.querySelector(".hmbrgr");
const togglehmbrgr = document.querySelector(".closed");
const sideNav = document.querySelector(".side-nav");
const sideNavList = document.querySelector(".side-nav ul");

togglehmbrgr.addEventListener('click', this.toggleNav);

function toggleNav() {
    if (hmbrgrDiv.style.visibility == 'initial') {
        if(togglehmbrgr.className == 'closed') {
            sideNav.style.width = '250px';
            sideNavList.style.visibility = 'initial';
            togglehmbrgr.className = 'open';
        } else {
            sideNav.style.width = '0px';
            sideNavList.style.visibility = 'hidden';
            togglehmbrgr.className = 'closed';
        }
    } else {
        sideNav.style.width = '250px';
        sideNavList.style.visibility = 'initial';
    }
    
}