const search = document.querySelector('input[name="searchbar"]');
const projectContainer = document.querySelector(".items");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (items) {
            projectContainer.innerHTML = "";
            loadItems(items)
        });
    }
});

function loadItems(items) {
    items.forEach(item => {
        console.log(item);
        createItem(item);
    });
}

function createItem(item) {
    const template = document.querySelector("#items-template");
    const clone = template.content.cloneNode(true);
    const image = clone.querySelector("img");
    const detail1 = clone.querySelector("#detail1");
    const detail2 = clone.querySelector("#detail2");
    const description = clone.querySelector("#description");
    image.src = `/public/uploads/${item.image}`;
    detail1.innerHTML = item.brand;
    detail2.innerHTML = item.size;
    description.innerHTML = item.description;


    projectContainer.appendChild(clone);
}