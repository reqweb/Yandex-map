## Plugin for Grav CMS for Yandex Map (API)

The plugin uses Yandex Maps API, read [Terms of use](https://tech.yandex.ru/maps/commercial/).  
If necessary, read the [documentation](https://tech.yandex.com/maps/jsapi/doc/2.1/quick-start/index-docpage/).  
You can get the API key here [Developer's Dashboard](https://developer.tech.yandex.ru/services/).

The plugin adds in `<head></head>` JS script.  
The second script, and inline JS adds in bottom part.  

### How to use

Add to the page (in the template or in the markdown content) block `<div id="map"></div>`  
The map will be placed in the block `#map`.  
You can customize the css for #map yourself, but by default the width will be 100% and the height 400px.

You can also disable the addition of inline css (height and width) of the plugin in the settings.
***

Plugin settings:

```
enabled: true
key:                                            # api key
coord: '59.931582, 30.360541'                   # Coordinates
zoom: '13'                                      # Map scale
lang: ru_RU                                     # Map language
mapiconcontent: 'some text'                     # Marker text
maphintcontent: 'some text'                     # Hover text
markertype: 'islands#lightBlueStretchyIcon'     # Appearance marker (color)
controls:                                       # Settings elements on the map
  traffic: trafficControl                       # on/off Traffic Control
  geolocation: geolocationControl               # on/off Geolocation Control
  zoomcontrol: zoomControl                      # on/off Zoom Control
  searchcontrol: searchControl                  # on/off Search Control
  typeselector: typeSelector                    # on/off Type Selector
  fullscreencontrol: fullscreenControl          # on/off Fullscreen Control
  routebuttoncontrol: routeButtonControl        # on/off Route Button Control
  plugincss: true                               # plugin's css
  windowwidth: 100%                             # width window
  windowheight: 400px                           # height window
```

All settings are available in the admin panel.
