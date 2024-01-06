

const wrapper = document.querySelector('.wrapper');
const registerLink = document.querySelector('.register-link');
const loginLink = document.querySelector('.login-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');
var navLinks = document.querySelector('.nav-links');



//login and registration
registerLink.onclick = () => {
    wrapper.classList.add('active');
};

loginLink.onclick = () => {
    wrapper.classList.remove('active');
};

btnPopup.onclick = () => {
    wrapper.classList.add('active-popup');
};


iconClose.onclick = () => {
    wrapper.classList.remove('active-popup');
    wrapper.classList.remove('active');

};


//togglemenu

function showMenu(){
    navLinks.style.right = "0";
}

function hideMenu(){
    navLinks.style.right = "-200px";
}
