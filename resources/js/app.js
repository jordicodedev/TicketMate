import './bootstrap';

document.addEventListener("DOMContentLoaded", function () {
    const createTicketButton = document.getElementById("createTicketButton");
    const modal = document.getElementById("createTicketModal");
    const closeButtons = document.querySelectorAll(".close");

    createTicketButton.addEventListener("click", function () {
        modal.classList.add("open");
    });

    closeButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            modal.classList.remove("open");
        });
    });
});