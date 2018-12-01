'use strict';

var active_search = document.querySelector('#searchAction');
var search_text = document.querySelector('#searchText');
var signOut = document.querySelector('#signOut');
var select = document.querySelector('#navSelect');

signOut.addEventListener('click', function (e) {
    var xhr = new XMLHttpRequest();

    xhr.open('POST', './logout', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(null);

    xhr.onreadystatechange = function () {
        if (xhr.readyState != 4) return;

        if (xhr.status != 200) {
            console.warn(xhr.status + ': ' + xhr.statusText);
        } else {}
    };
});

active_search.addEventListener('click', function (e) {
    constructor.getNotification(select.value);
});

function createSelect(arr) {
    var data = JSON.parse(arr);

    data.forEach(function (option) {
        select.appendChild(createOption(option));
    });
}

function createOption(el) {
    var option = document.createElement('option');
    option.innerHTML = el;
    option.value = el;

    return option;
}

var xhr = new XMLHttpRequest();

xhr.open('POST', './categories.php', true);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(null);

xhr.onreadystatechange = function () {
    if (xhr.readyState != 4) return;

    if (xhr.status != 200) {
        console.warn(xhr.status + ': ' + xhr.statusText);
    } else {
        createSelect(xhr.responseText);
    }
};