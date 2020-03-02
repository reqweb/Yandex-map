<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

class YandexMapPlugin extends Plugin
{
    
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }

    public function onPluginsInitialized()
    {
        if ($this->isAdmin()) {
            return;
        }
        $key = trim($this->config->get('plugins.yandex-map.key'));
        
        $controls_array = [];
        
        $controls_array[] = trim($this->config->get('plugins.yandex-map.controls.traffic'));
        $controls_array[] = trim($this->config->get('plugins.yandex-map.controls.geolocation'));
        $controls_array[] = trim($this->config->get('plugins.yandex-map.controls.zoomcontrol'));
        $controls_array[] = trim($this->config->get('plugins.yandex-map.controls.searchcontrol'));
        $controls_array[] = trim($this->config->get('plugins.yandex-map.controls.typeselector'));
        $controls_array[] = trim($this->config->get('plugins.yandex-map.controls.fullscreencontrol'));
        $controls_array[] = trim($this->config->get('plugins.yandex-map.controls.routebuttoncontrol'));
        
        $controls_count = count($controls_array);
        $controls = "";
        
        $controls_countitem = 0;
        foreach($controls_array as $item_control){
            if(!empty($item_control)){
                $controls_countitem++;
                if($controls_countitem != $controls_count){
                    $controls .= " '" .$item_control."',";
                }
                else{
                    $controls .= " '" .$item_control. "'";
                }
            }
        };
        
        $controls = trim($controls);
        
        $zoom = trim($this->config->get('plugins.yandex-map.zoom'));
        $lang = trim($this->config->get('plugins.yandex-map.lang'));
        $mapiconcontent = $this->config->get('plugins.yandex-map.mapiconcontent');
        $maphintcontent = $this->config->get('plugins.yandex-map.maphintcontent');
        $markertype = $this->config->get('plugins.yandex-map.markertype');
        $coord = trim($this->config->get('plugins.yandex-map.coord'));
        $mapapi = 'https://api-maps.yandex.ru/2.1/?apikey='. $key .'&lang='. $lang .'';
        
        if ($this->config->get('plugins.yandex-map.plugincss')) {
            $this->grav['assets']->addCss('plugin://yandex-map/css/yandex-map.css');
        }
        
        $this->grav['assets']->addInlineJs('
            var coord = ['.$coord.']; 
            var zoom = '. $zoom .';
            var iconcontent = "'. $mapiconcontent .'";
            var hintcontent = "'. $maphintcontent .'";
            var markertype = "'. $markertype .'";
            var controls = ['.$controls .']; 
        ', ['group' => 'bottom', 'position' => 'before']);

        $this->grav['assets']->addJs('plugin://yandex-map/js/yandex-map.js', ['group' => 'bottom']);

        $this->grav['assets']->addJs($mapapi);   
        
    }
}