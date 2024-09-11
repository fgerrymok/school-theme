// const menuBtn = document.getElementById('menu-toggle');

function toggleMobileNavigation() {
    if ( document.getElementById('primary-menu').style.display === 'block' ) {
        document.getElementById('primary-menu').style.display= "none";
    } else {
        document.getElementById('primary-menu').style.display = "block";
    }
}