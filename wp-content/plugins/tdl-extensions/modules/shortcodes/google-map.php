<?php

// [google_map]
function shortcode_google_map($atts, $content=null, $code) {
    
    extract(shortcode_atts(array(
        'size' => '450',
        'img_link_target' => '',
        'map_center_lat'=> '', 
        'map_center_lng'=> '', 
        'zoom' => '6', 
        'enable_zoom' => '', 
        'marker_image'=> '', 
        'map_greyscale' => '',
        'map_color' => '',
        'ultra_flat' => '',
        'dark_color_scheme' => '',
        'marker_animation'=> 'false',
        'map_markers' => '',
        'marker_style' => 'default',
        'eva_marker_color' => ''        
    ), $atts));

    wp_enqueue_script('evaMap', get_template_directory_uri() . '/js/map.js', array('jquery'), '1.0', TRUE);

    $markersArr = array();
    $explodedByBr = explode("\n", $map_markers);    
    $count = 0;
    
    foreach ($explodedByBr as $brExplode) {
        
        $markersArr[$count] = array();
      
        $explodedBySep = explode('|', $brExplode);
      
        foreach ($explodedBySep as $sepExploded) {
            $markersArr[$count][] = $sepExploded;
        }
      
        $count++;
    }

    
    $map_data = null;
    $unique_id = uniqid("map_");
    
    $marker_image_src = null;
    if(!empty($marker_image)) {
        $marker_image_src = wp_get_attachment_image_src($marker_image, 'full');
        $marker_image_src = $marker_image_src[0];
    }

    ob_start();

    echo '<div id="'.$unique_id.'" style="height: '.$size.'px;" class="eva-google-map" data-dark-color-scheme="'. $dark_color_scheme .'" data-marker-style="'.$marker_style.'" data-eva-marker-color="'.$eva_marker_color.'" data-ultra-flat="'.$ultra_flat.'" data-greyscale="'.$map_greyscale.'" data-extra-color="'.$map_color.'" data-enable-animation="'.$marker_animation.'" data-enable-zoom="'.$enable_zoom.'" data-zoom-level="'.$zoom.'" data-center-lat="'.$map_center_lat.'" data-center-lng="'.$map_center_lng.'" data-marker-img="'.$marker_image_src.'"></div>';
    echo '<div class="'.$unique_id.' map-marker-list">';
        $count = 0;
        for($i = 1; $i <= sizeof($markersArr); $i++){
            
            if(empty($markersArr[$count][0])) $markersArr[$count][0] = null;
            if(empty($markersArr[$count][1])) $markersArr[$count][1] = null;
            if(empty($markersArr[$count][2])) $markersArr[$count][2] = null;
        
            echo '<div class="map-marker" data-lat="'.$markersArr[$count][0].'" data-lng="'.$markersArr[$count][1].'" data-mapinfo="'.$markersArr[$count][2].'"></div>';

            $count++;
        }
    echo '</div>';

    wp_reset_query();
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

add_shortcode("google_map", "shortcode_google_map");