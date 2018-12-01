let newSelect = document.querySelector('#categoryNewCard');
let addNewCard = document.querySelector('#sendNewCard');

createSelect(options, newSelect);

addNewCard.addEventListener('click', (e) => {
    let category = document.querySelector('#categoryNewCard').value;
    let title = document.querySelector('#cardNewTitle').value;
    let description = document.querySelector('#cardNewDesk').value;

    let xhr = new XMLHttpRequest();

    let text = `category="${category}"&title="${title}"&description="${description}"`;

    xhr.open('POST', 'add_post.php', true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send(text);

    xhr.onreadystatechange = function() {
        if (xhr.readyState != 4) return;

        if (xhr.status != 200) {
            console.warn(xhr.status + ': ' + xhr.statusText);
        } else {
        }
    };
});