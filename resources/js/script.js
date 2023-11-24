const hamburger = document.querySelector('#hamburger');
const xClose = document.querySelector('#x-close');
const navMenu = document.querySelector('#nav-menu');

hamburger.addEventListener('click', function(){
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.add('flex');
    navMenu.classList.remove('hidden');
});

xClose.addEventListener('click', function(){
    navMenu.classList.add('hidden');
    navMenu.classList.remove('flex');
});