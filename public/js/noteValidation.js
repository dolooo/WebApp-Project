const noteInput = document.querySelector('textarea[name="text"]')

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function isNoteNotTooLong(note) {
    return note < 500;
}
function printNumberOfCharacters(note) {
    const div = document.querySelector("#numberOfCharacters");
    div.innerHTML = note+"/500";
}

function validateNote() {
    printNumberOfCharacters(noteInput.value.length)
    setTimeout(function () {
            const condition = isNoteNotTooLong(noteInput.value.length);
            markValidation(noteInput, condition);
        },
        1000
    );
}

noteInput.addEventListener('keyup', validateNote);