const openNavButton = document.getElementById("openNav");
const closeNavButton = document.getElementById("closeNav");
const navbar = document.getElementById("navbar");

openNavButton.addEventListener("click", () => {
    navbar.classList.remove("hidden");
    openNavButton.classList.add("hidden");
    closeNavButton.classList.remove("hidden");
});

closeNavButton.addEventListener("click", () => {
    navbar.classList.add("hidden");
    openNavButton.classList.remove("hidden");
    closeNavButton.classList.add("hidden");
});
