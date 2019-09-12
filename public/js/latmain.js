function init() {
        myMap = new ymaps.Map('map', {
            center: [54.74051563346905,55.95903507582377],
            zoom: 11,
            controls: ['zoomControl']
        }),
        // Создаем коллекцию.
        myCollection = new ymaps.GeoObjectCollection(null, {
            // Запретим появление балуна.
            hasBalloon: false,
            iconColor: '#3b5998'
        }),
        panel = new ymaps.Panel(),
        // Создаем массив с данными.
        myPoints = [{
                coords: [54.79384204472231,56.056871946117255],
                text: '',
                hintContent: 'Улица Адмирала Макарова'
            },
            {
                coords: [55.66, 37.48],
                text: ''
            },
            {
                coords: [55.65, 37.42],
                text: ''
            },
            {
                coords: [55.64, 37.54],
                text: ''
            },
        ];

    myMap.controls.add(panel, {
        float: 'left'
    });   

    // Заполняем коллекцию данными.
    for (var i = 0, l = myPoints.length; i < l; i++) {
        var point = myPoints[i];
        let pl = new ymaps.Placemark(
            point.coords, { balloonContent: point['text'] }
        );
        myCollection.add(pl);
    }
    
    // Добавляем коллекцию меток на карту.
    myMap.geoObjects.add(myCollection);
    
    // Подпишемся на событие клика по коллекции.
    myCollection.events.add('click', function (e) {
        // Получим ссылку на геообъект, по которому кликнул пользователь.
        var target = e.get('target');
        // Зададим контент боковой панели.
        panel.setContent(target.properties.get('balloonContent'));
        // Переместим центр карты по координатам метки с учётом заданных отступов.
        //map.panTo(target.geometry.getCoordinates(), {useMapMargin: true});
    });

    // Создаем экземпляр класса ymaps.control.SearchControl
    var mySearchControl = new ymaps.control.SearchControl({
        options: {
            // Заменяем стандартный провайдер данных (геокодер) нашим собственным.
            provider: new CustomSearchProvider(myPoints),
            // Не будем показывать еще одну метку при выборе результата поиска,
            // т.к. метки коллекции myCollection уже добавлены на карту.
            noPlacemark: true,
            resultsPerPage: 5
        }
    });

    // Добавляем контрол в верхний правый угол,
    myMap.controls
        .add(mySearchControl, {
            float: 'left'
        }); 

    // Результаты поиска будем помещать в коллекцию.
    mySearchResults = new ymaps.GeoObjectCollection(null, {
        hintContentLayout: ymaps.templateLayoutFactory.createClass('$[properties.name]')
    });
    myMap.controls.add(mySearchControl);
    myMap.geoObjects.add(mySearchResults);
    // При клике по найденному объекту метка становится красной.
    mySearchResults.events.add('click', function (e) {
        e.get('target').options.set('preset', 'islands#redIcon');
    });
    // Выбранный результат помещаем в коллекцию.
    mySearchControl.events.add('resultselect', function (e) {
        var index = e.get('index');
        mySearchControl.getResult(index).then(function (res) {
            mySearchResults.add(res);
        });
    }).add('submit', function () {
        mySearchResults.removeAll();
    });
}


// Провайдер данных для элемента управления ymaps.control.SearchControl.
// Осуществляет поиск геообъектов в по массиву points.
// Реализует интерфейс IGeocodeProvider.
function CustomSearchProvider(points) {
    this.points = points;
}

// Провайдер ищет по полю text стандартным методом String.ptototype.indexOf.
CustomSearchProvider.prototype.geocode = function (request, options) {
    var deferred = new ymaps.vow.defer(),
        geoObjects = new ymaps.GeoObjectCollection(),
        // Сколько результатов нужно пропустить.
        offset = options.skip || 0,
        // Количество возвращаемых результатов.
        limit = options.results || 20;

    var points = [];
    // Ищем в свойстве text каждого элемента массива.
    for (var i = 0, l = this.points.length; i < l; i++) {
        var point = this.points[i];
        if (point.text.toLowerCase().indexOf(request.toLowerCase()) != -1) {
            points.push(point);
        }
    }
    // При формировании ответа можно учитывать offset и limit.
    points = points.splice(offset, limit);
    // Добавляем точки в результирующую коллекцию.
    for (var i = 0, l = points.length; i < l; i++) {
        var point = points[i],
            coords = point.coords,
            text = point.text;

        geoObjects.add(new ymaps.Placemark(coords, {
            name: text + ' name',
            description: text + ' description',
            balloonContentBody: '<p>' + text + '</p>',
            boundedBy: [coords, coords]
        }));
    }

    deferred.resolve({
        // Геообъекты поисковой выдачи.
        geoObjects: geoObjects,
        // Метаинформация ответа.
        metaData: {
            geocoder: {
                // Строка обработанного запроса.
                request: request,
                // Количество найденных результатов.
                found: geoObjects.getLength(),
                // Количество возвращенных результатов.
                results: limit,
                // Количество пропущенных результатов.
                skip: offset
            }
        }
    });

    // Возвращаем объект-обещание.
    return deferred.promise();
};

ymaps.ready(['Panel']).then(function () {
    init();
});