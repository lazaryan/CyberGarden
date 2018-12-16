'use strict';

//get data

var newSelect = document.querySelector('#categoryNewCard');
var addNewCard = document.querySelector('#sendNewCard');

createSelect(options, newSelect);

addNewCard.addEventListener('click', function (e) {
    var category = document.querySelector('#categoryNewCard').value;
    var title = document.querySelector('#cardNewTitle').value;
    var description = document.querySelector('#cardNewDesk').value;

    var xhr = new XMLHttpRequest();

    var text = 'category="' + category + '"&title="' + title + '"&description="' + description + '"';

    xhr.open('POST', 'add_post.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(text);

    xhr.onreadystatechange = function () {
        if (xhr.readyState != 4) return;

        if (xhr.status != 200) {
            console.warn(xhr.status + ': ' + xhr.statusText);
        } else {}
    };
});

//add form
var action_form = document.querySelector('#addCard');
var form_card = document.querySelector('#redactorCard');

action_form.addEventListener('click', function () {
    form_card.style.display = '';
});

//close_form
var close_form = document.querySelector('#closeRedactor');
close_form.addEventListener('click', function () {
    form_card.style.display = 'none';
});