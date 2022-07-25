"use strict";

let editButtons = document.querySelectorAll(".editButton");
let inputs = document.querySelectorAll("input")

inputs.forEach(input => {
    input.style.width = input.scrollWidth + 'px'
    input.addEventListener('input', e => e.target.style.width = e.target.scrollWidth + 'px')
})

editButtons.forEach(b => {

    b.addEventListener('click', (e) => {
        e.preventDefault();
        let data = b.getAttribute("data-id")
        let inputField = document.getElementById(`input${data}`)
        let saveButton = document.getElementById(`saveButton${data}`)
        let deleteButton = document.getElementById(`deleteButton${data}`)
        inputField.toggleAttribute("disabled")
        inputField.toggleAttribute("readonly")
        saveButton.toggleAttribute("hidden")
        deleteButton.toggleAttribute("hidden")
        b.toggleAttribute("hidden")
        inputField.focus()
    });
});

