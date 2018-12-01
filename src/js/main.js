class Construct {
    constructor (block) {
        this.initblock(block);

        this.getNotification();
    }

    initblock (el) {
        this.el = el ? typeof el == 'Object' ? el : document.querySelector(el) : document.querySelector('body');
    }

    getNotification (category=undefined) {
        let xhr = new XMLHttpRequest();

        xhr.open('POST', 'teachers.php', true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
         xhr.send(category ? `category=${category}` : null);

        xhr.onreadystatechange = function() {
           if (xhr.readyState != 4) return;

           if (xhr.status != 200) {
               console.warn(xhr.status + ': ' + xhr.statusText);
           } else {
               this.create(xhr.responseText);
           }
       }
    }

    /**
     * @param data_str - Object {categoty, text, title}
     */
    create (data_str) {
        let data = JSON.parse(data_str);

        data.forEach((el) => {
            this.el.appendChild(this.getElement(el));
        })
    }

    getElement(el) {
        let link = document.createElement('a');
        link.classList = 'notification__card';
        link.href = '#';

        link.innerHTML = `
            <h2 class="notification__title">${el.title}</h2>
            <div class="notification__description">${el.text}</div>
        `;

        return link;
    }
}