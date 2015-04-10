=== Plugin Name ===
Contributors: Zaglov, imbaa
Tags: responsive, google, google maps
Requires at least: 3.0.1
Tested up to: 4.1.1
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This Plug-In displays responsive and configurable Maps by Google Maps in your WordPress Site.

== Description ==

The responsive Goolge Maps Plug-In brings Responsive [Google Maps API](https://developers.google.com/maps/?hl=de "Google Maps API") via the Google Maps API  to your site.
When the browser-window is resized, the Plug-In automatically recenters the map view to the desired coordinates. You can activate and deactivate map control elements, set the height and the type of map (road, satellite).

And that’s pretty much it.

How to use:

The Plug-In requires at leas two values to work: the latitude and the longitude of the location to display

[responsive_map lat="51.44303" lng="7.01247"]

If you need to use the Shortcode inside a theme, just use `<?php do_shortcode('[responsive_map lat="51.44303" lng="7.01247"]') ?>`.

See it in action on [imbaa Kreativagentur](http://www.imbaa.de "imbaa Kreativagentur Essen")'s site.

Possible other Parameters:


*   lng: 51.44303  / Longitude
*   lat: 7.01247 / Latitude
*   height = 400px / Height of the Container of the Map
*   zoom = 10 / Zoom Level of the Map
*   show_marker = true / Should a marker be displayed?
*   title = null / Title of the Marker
*   zoom_control = true / Enable or disable Zoom-Conrol
*   map_type_control = true / Enable or disable Map-Type-Conrol
*   scale_control = true / Enable or disable Scale Control
*   street_view_control = true / Enable or disable Street View
*   overview_map_control = true / Enable or disable Map Control
*   map_type (str) = road / Set Map Typ to Road („road“) or satellite („sattelite“)


== Installation ==


1. Upload the Plug-In Direcotry into the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use the [responsive_map] Shortcode in your Site