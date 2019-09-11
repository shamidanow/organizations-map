@extends('organizations/layout')

@section('content')
	<h1 class="title">Карта организаций</h1>
	
	<div id="map" style="width: 100%; height:500px"></div>
 
    <script src="http://api-maps.yandex.ru/2.1/?lang=ru-RU" type="text/javascript"></script>
    <script type="text/javascript">
    ymaps.ready(init);
    function init() {
    	var myMap = new ymaps.Map("map", {
    		center: ['{{ $first->fact_addr_coord }}'],
    		zoom: 16
    	}, {
    		searchControlProvider: 'yandex#search'
    	});
     
    	var myCollection = new ymaps.GeoObjectCollection(); 
     
    	// Добавим метки для оставшихся организаций в списке
		@foreach ($organizations as $organization)
    	var myPlacemark = new ymaps.Placemark([
			{{ $organization->getPoint() }}
    	], {
    		balloonContent: '{!! $organization->getComment() !!}'
    	}, {
    		preset: 'islands#icon',
    		iconColor: '#0000ff'
    	});
    	myCollection.add(myPlacemark);
		@endforeach
     
    	myMap.geoObjects.add(myCollection);
    	
    	// Сделаем у карты авто масштаб чтобы были видны все метки
    	myMap.setBounds(myCollection.getBounds(),{checkZoomRange:true, zoomMargin:9});
    }
    </script>
    
    <div class="column">
    	<form method="LINK" action="/organizations">
            <input type="submit" class="button is-link" value="Вернуться к списку организаций">
        </form>
    </div>
@endsection