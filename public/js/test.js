function callMe() {
    const toggle = document.getElementById('nax-toggle'),
    nav = document.getElementById('nax-bar'),
    bodypd = document.getElementById('body-pd'),
    headerpd = document.getElementById('nax-header');
    // show navbar
    nav.classList.toggle('show')
    // change icon
    toggle.classList.toggle('bx-x')
    // add padding to body
    bodypd.classList.toggle('body-pd')
    // add padding to header
    headerpd.classList.toggle('body-pd')
}