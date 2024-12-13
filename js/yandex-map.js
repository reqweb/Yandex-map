if($("*").is("#map"))

ymaps.ready(init);

function init() {
    $("#map").css({'width':windowwidth, 'height':windowheight})
    var yandexMap = new ymaps.Map("map", {
            center: coord,
            zoom: zoom,
            controls: controls
        }, {
            searchControlProvider: 'yandex#search'
        }),
        myGeoObject = new ymaps.GeoObject({
            geometry: {
                type: "Point",
                coordinates: coord
            },
            properties: {
                iconContent: iconcontent,
                hintContent: hintcontent
            }
        }, {
            preset: markertype,
            draggable: true
        });
        yandexMap.geoObjects
            .add(myGeoObject)
}
