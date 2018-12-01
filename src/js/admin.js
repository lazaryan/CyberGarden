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