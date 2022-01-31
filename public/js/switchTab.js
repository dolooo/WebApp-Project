function switchTab(tab) {
    fetch(tab, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(function (response) {
        return response.json();
    }).then(function (items) {
        itemsContainer.innerHTML = "";
        loadItems(items)
    });
}

function loadItems(items) {
    items.forEach(item => {
        console.log(item);
        createItem(item);
    });
}