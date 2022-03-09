const editButtons = document.querySelectorAll(".fa-pencil-alt");
const item = document.getElementById("file").title;

editButtons.forEach(button => button.addEventListener("click", editItem));



function editItem() {
    const category = prompt("Kategoria: ");
    const brand = prompt("Marka: ");
    const size = prompt("Rozmiar: ");
    const description = prompt("Opis: ");
    const data = {
        file: item,
        category : category,
        brand: brand,
        size: size,
        description: description
    };
        fetch("/edit", {
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

