'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Construct = function () {
    function Construct(block) {
        _classCallCheck(this, Construct);

        this.initblock(block);

        this.getNotification();
    }

    _createClass(Construct, [{
        key: 'initblock',
        value: function initblock(el) {
            this.el = el ? typeof el == 'Object' ? el : document.querySelector(el) : document.querySelector('body');
        }
    }, {
        key: 'getNotification',
        value: function getNotification() {
            var category = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : undefined;

            var xhr = new XMLHttpRequest();

            xhr.open('POST', 'teachers.php', true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send(category ? 'category=' + category : null);

            xhr.onreadystatechange = function () {
                if (xhr.readyState != 4) return;

                if (xhr.status != 200) {
                    console.warn(xhr.status + ': ' + xhr.statusText);
                } else {
                    constructor.clearBlock();
                    this.create(xhr.responseText);
                }
            }.bind(this);
        }

        /**
         * @param data_str - Object {categoty, text, title}
         */

    }, {
        key: 'create',
        value: function create(data_str) {
            var _this = this;

            var data = JSON.parse(data_str);

            data.forEach(function (el) {
                _this.el.appendChild(_this.getElement(el));
            });
        }
    }, {
        key: 'getElement',
        value: function getElement(el) {
            var link = document.createElement('a');
            link.classList = 'notification__card';
            link.href = './post/' + el.id;

            link.innerHTML = '\n            <h2 class="notification__title">' + el.title + '</h2>\n            <div class="notification__description">' + el.text + '</div>\n            <div class="notification__category">' + el.category + '</div>\n        ';

            return link;
        }
    }, {
        key: 'clearBlock',
        value: function clearBlock() {
            this.el.innerHTML = '';
        }
    }]);

    return Construct;
}();

var constructor = new Construct('.main__notification');