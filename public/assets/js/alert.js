const closeAlert = document.getElementById("closeAlert");
const alert = document.getElementById("alert");

closeAlert.addEventListener("click", () => {
    alert.classList.add("hidden");
});

setTimeout(() => {
    alert.classList.add("hidden");
}, 5000);
