const togglePassword = document.getElementById('openEye');
const password = document.getElementById('password');

if (togglePassword) {
    togglePassword.addEventListener('click', function () {
        const isVisible = password.type === 'text';
        password.type = isVisible ? 'password' : 'text';
        this.classList.toggle('fi-rr-eye-crossed');
        this.classList.toggle('fi-rr-eye');
    });
}

const menuBtn = document.querySelector('.nav-menu-btn');
const navLinks = document.getElementById('nav-links');
menuBtn.addEventListener('click', (e) => {
    menuBtn.classList.toggle('active');
    navLinks.classList.toggle('open');
})

navLinks.addEventListener('click', (e)=>{
    menuBtn.classList.remove('active');
    navLinks.classList.remove('open');
})

if(window.location.hash === "#send"){
    document.documentElement.style.scrollBehavior = "auto";
    document.body.style.scrollBehavior = "auto";

    setTimeout(() => {
        document.documentElement.style.scrollBehavior = "";
        document.body.style.scrollBehavior = "";
    },100);
}