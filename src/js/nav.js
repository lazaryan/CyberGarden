let active_search = document.querySelector('#searchAction');
let search_text = document.querySelector('#searchText');
let signOut = document.querySelector('#signOut');

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
})