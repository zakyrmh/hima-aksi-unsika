// Navbar mobile
const toggleNavButton = document.getElementById("toggleNav");
const hamburgerIcon = document.getElementById("hamburgerIcon");
const closeIcon = document.getElementById("closeIcon");
const navbar = document.getElementById("navbar");

toggleNavButton.addEventListener("click", () => {
    navbar.classList.toggle("hidden");
    hamburgerIcon.classList.toggle("hidden");
    closeIcon.classList.toggle("hidden");
});

// Dropdown
const toggleDropdown = document.getElementById("toggleDropdown");
const dropdown = document.getElementById("dropdown");

toggleDropdown.addEventListener("click", () => {
    dropdown.classList.toggle("hidden");
});
