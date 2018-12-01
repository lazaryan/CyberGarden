'use strict';

var active_search = document.querySelector('#searchAction');
var search_text = document.querySelector('#searchText');
active_search.addEventListener('click', function (e) {
    e.preventDefault();

    if (!search_text.value) return;
});