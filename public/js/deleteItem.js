const deleteButtons = document.querySelectorAll(".fa-trash-alt");
const itemToDelete = document.getElementById("file").title;

deleteButtons.forEach(button => button.addEventListener("click", deleteItem));

function deleteItem() {
    if (confirm('Usunięcie tej rzeczy spowoduje usunięcie powiązanych z nią stylizacji. Czy chcesz kontynuować?')) {
        const data = {item : itemToDelete};
        fetch("/delete", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function () {
            location.replace("http://localhost:8080/wardrobe");
        });
    }
}