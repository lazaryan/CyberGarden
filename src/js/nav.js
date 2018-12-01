let active_search = document.querySelector('#searchAction');
let search_text = document.querySelector('#searchText');
let signOut = document.querySelector('#signOut');
let select = document.querySelector('#navSelect');

signOut.addEventListener('click', (e) => {
    let xhr = new XMLHttpRequest();

    xhr.open('POST', './logout', true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send(null);

    xhr.onreadystatechange = function() {
        if (xhr.readyState != 4) return;

        if (xhr.status != 200) {
            console.warn(xhr.status + ': ' + xhr.statusText);
        } else {

        }
    }
});

active_search.addEventListener('click', (e) => {
    constructor.getNotification(select.value);
});

function createSelect(arr) {
    let data = JSON.parse(arr);

    data.forEach((option) => {
        select.appendChild(createOption(option));
    })
}

function createOption (el) {
    let option = document.createElement('option');
    option.innerHTML = el;
    option.value = el;

    return option;
}

let xhr = new XMLHttpRequest();

xhr.open('POST', './categories.php', true);
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xhr.send(null);

xhr.onreadystatechange = function() {
    if (xhr.readyState != 4) return;

    if (xhr.status != 200) {
        console.warn(xhr.status + ': ' + xhr.statusText);
    } else {
        createSelect(xhr.responseText);
    }
}