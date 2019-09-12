// Пример реализации собственного меню на основе наследования от Collection.
var bind = ymaps.util.bind,
    map = new ymaps.Map(
        'map', {
            center: [55.819543, 37.611619],
            zoom: 6
        }
    ),
// Создаем собственный класс дочернего элемента меню.
    MenuItem = function (data, options) {
        MenuItem.superclass.constructor.call(this, options);
        // Создаем менеджер данных.
        // Если первым аргументом передали строчку, то обрачиваем её в хеш.
        this._data = new ymaps.data.Manager((typeof data == 'string') ? { content: data } : data);
        this._$content = null;
    };

// Наследуем MenuItem от collection.Item.
ymaps.util.augment(MenuItem, ymaps.collection.Item, {
    onAddToMap: function (map) {
        MenuItem.superclass.onAddToMap.call(this, map);
        var parentDomContainer = this.getParent().getChildElement(this);
        this._$content = $('<div class="menuItem"></div>').appendTo(parentDomContainer);
        // Создаем слушателя изменения поля 'content' в _data.
        this._dataMonitor = new ymaps.Monitor(this._data);
        this._dataMonitor.add('content', this._applyContent, this);
        this._applyContent(this._data.get('content', ''));
        // Пример использования менеджера событий domEvent.manager.
        this._eventsGroup = ymaps.domEvent.manager.group(this._$content[0]);
        this._eventsGroup.add('click', function () {
            this.events.fire('click');
        }, this);
    },

    onRemoveFromMap: function () {
        this._$content.remove();
        this._dataMonitor.removeAll();
        this._eventsGroup.removeAll();
        MenuItem.superclass.onRemoveFromMap.call(this);
    },

    getData: function () {
        return this._data;
    },

    _applyContent: function (newValue) {
        this._$content.text(newValue);
    }
});

// Создаем собственный класс меню.
var Menu = function (options) {
    Menu.superclass.constructor.call(this, options);
    this._$content = null;
};

// Наследуем Menu от Collection.
ymaps.util.augment(Menu, ymaps.Collection, {
    onAddToMap: function (map) {
        Menu.superclass.onAddToMap.call(this, map);
        var parentDomContainer = this.getParent().getChildElement(this);
        this._$content = $('<div class="menu"></div>').appendTo(parentDomContainer);
    },

    onRemoveFromMap: function () {
        this._$content.remove();
        Menu.superclass.onRemoveFromMap.call(this);
    },

    getChildElement: function (chilElement) {
        return this._$content;
    }
});

// Пример использования пользовательского элемента управления "Меню".
var menu = new Menu(),
    menuItem1 = new MenuItem('Пункт 1'),
    menuItem2 = new MenuItem({content: 'Второй пункт'}),
    menuItem3 = new MenuItem('Третий пункт');

menu.add(menuItem1);
menu.add(menuItem2);
menu.add(menuItem3);
map.controls.add(menu, {top: 5, left: 5});
// Изменяем данные в первом пункте меню.
menuItem1.getData().set('content', 'Первый пункт');
// Удаляем последний пункт из меню.
menu.remove(menuItem3);

// Можно прослушивать события не каждого отдельного элемента, а сразу всей коллекции.
menu.events.add('click', function (event) {
    // Запрашиваем порядковый номер элемента, который проинициировал событие.
    console.log('menu item #' + menu.indexOf(event.get('target')));
});