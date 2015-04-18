<?php
defined('ABSPATH') or die("No script kiddies please!");

/*

    Plugin Name: Responsive Google Maps
    Description: This Plug-In displays responsive and configurable Maps by Google Maps in your WordPress Site
    Version: 1.1.1
    Author: Ilja Zaglov | imbaa Kreativagentur
    Author URI: http://www.imbaa.de
    Plugin URI: https://wordpress.org/plugins/responsive-google-maps/
    Network: true
    License: GPL2

    Copyright 2015  Ilja Zaglov  (email : ilja.zaglov@imbaa.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA


 */


class responsive_maps {

    public function __construct()
    {


        add_shortcode( 'responsive_map', array($this,'responsive_map_func') );
        add_action('init',array($this,'register_scripts'));

    }


    public function register_scripts(){

        //wp_register_script( 'googleMaps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=visualization' );
        wp_register_script( 'responsiveMaps', plugins_url( '/js/responsiveMaps.js', __FILE__ ),array('jquery'),'1.1.1',true);
        //wp_register_script( 'responsiveMaps', plugins_url( '/js/responsiveMaps.js', __FILE__ ),array('jquery','googleMaps'),'1.0.3',true);

    }

    public function responsive_map_func($args,$content){




        $args = shortcode_atts( array(
            'lat' => 50.44,
            'lng' => 7.01,
            'style' => null,
            'zoom' => 10,
            'title' => null,
            'height' => '400px',
            'zoom_control' => 1,
            'map_type_control' => 1,
            'scale_control' => 1,
            'street_view_control' =>1,
            'overview_map_control' => 1,
            'show_marker' => 1,
            'map_type' => 'road',
            'pan_control' => 1,
            'draggable' => 0,
            'scrollwheel' => 1,
            'auto_open_info_window' => 0

        ), $args );


        echo "<pre>";

        print_r($args);

        echo "</pre>";

        $id = 'responsiveMap'.md5(time().microtime());

        wp_enqueue_script('responsiveMaps');

        $output = '<div
                            class="responsiveMap"
                            id="'.$id.'"
                            style="height:'.$args['height'].';"
                            data-title="'.$args['title'].'"
                            data-lat="'.$args['lat'].'"
                            data-lng="'.$args['lng'].'"
                            data-style="'.$args['style'].'"
                            data-zoom="'.$args['zoom'].'"
                            data-zoomcontrol="'.$args['zoom_control'].'"
                            data-maptypecontrol="'.$args['map_type_control'].'"
                            data-scalecontrol="'.$args['scale_control'].'"
                            data-streetviewcontrol="'.$args['street_view_control'].'"
                            data-overviewmapcontrol="'.$args['overview_map_control'].'"
                            data-showmarker="'.$args['show_marker'].'"
                            data-maptype="'.$args['map_type'].'"
                            data-pancontrol="'.$args['pan_control'].'"
                            data-scrollwheel="'.$args['scrollwheel'].'"
                            data-draggable="'.$args['draggable'].'"
                            data-info-window-text="'.$content.'"
                            data-autoOpenInfoWindow="'.$args['auto_open_info_window'].'"
                ></div>';


        return $output;

    }
}



$plugin = new responsive_maps();




?>