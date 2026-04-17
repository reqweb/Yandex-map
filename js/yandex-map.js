if ($("#map").length) {
    ymaps.ready(init);
}

function init() {
    $("#map").css({'width': windowwidth, 'height': windowheight});

    var yandexMap = new ymaps.Map("map", {
            center: coord,
            zoom: zoom,
            controls: controls
        }, {
            searchControlProvider: 'yandex#search'
        });
    
    if(zoomwheelctrl === "zoomwheelctrl"){
        yandexMap.behaviors.disable('scrollZoom');
        var mapContainer = document.getElementById('map');
        mapContainer.addEventListener('wheel', function(e) {
            if (e.ctrlKey) {
                e.preventDefault();
                var delta = e.deltaY < 0 ? 1 : -1;
                yandexMap.setZoom(yandexMap.getZoom() + delta);
            }
        }, { passive: false });
    }
    
    var myGeoObject = new ymaps.GeoObject({
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

    yandexMap.geoObjects.add(myGeoObject);
}