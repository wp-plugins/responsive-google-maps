/*!
 * jQuery Responsive Maps Plug-In
 * version: 1.1.0
 * Requires jQuery v1.5 or later
 * Copyright (c) 2015 Ilja Zaglov | imbaa Kreativagentur | http://www.imbaa.de
 * Licensed under GPL
 */

var responsiveMap = function(mapID){

    $ = jQuery;


    var element = $('#'+mapID);

    var self = this;

    self.map = null;


    self.isTouchDevice = function () {
        return !!('ontouchstart' in window);
    };


    self.init = function() {


        var args = element.data();







        if(args.style == 'monochrome'){

            var styleArray = [
                {
                    featureType: "all",
                    stylers: [
                        { saturation: -100 }
                    ]
                },{
                    featureType: "road.arterial",
                    elementType: "geometry",
                    stylers: [

                        { saturation: 0 }
                    ]
                },{
                    featureType: "poi.business",
                    elementType: "labels",
                    stylers: [
                        { visibility: "off" }
                    ]
                }
            ];


        } else {

            var styleArray = [];

        }


        if(self.isTouchDevice()) {
            var draggable = false;
        } else {
            var draggable = args.draggable
        }



        if(args.maptype == 'satellite'){

            args.maptype = google.maps.MapTypeId.SATELLITE;

        } else if (args.maptype == 'road'){

            args.maptype = google.maps.MapTypeId.ROAD;

        }





        var mapOptions = {
            zoom: parseInt(args.zoom),
            center: new google.maps.LatLng(args.lat, args.lng),
            styles:styleArray,
            zoomControl: args.zoomcontrol,
            disableDoubleClickZoom: false,
            mapTypeControl: args.maptypecontrol,
            scaleControl:args.scalecontrol,
            scrollwheel: args.scrollwheel,
            panControl: args.pancontrol,
            streetViewControl: args.streetviewcontrol,
            draggable : draggable,
            overviewMapControl: args.overviewmapcontrol,
            overviewMapControlOptions: {
                opened: args.overviewmapcontrol
            },
            mapTypeId: args.maptype

        };

        self.map = new google.maps.Map(document.getElementById(mapID), mapOptions);


        if(args.showmarker == true){

            new google.maps.Marker({
                position: new google.maps.LatLng(args.lat, args.lng),
                map: self.map,
                title: args.title
            });

        }


        $(window).bind('resize',function(){

            self.map.setCenter(new google.maps.LatLng(args.lat, args.lng));

        });





    }

    self.init(mapID);

}


$ = jQuery;

$(document).ready(function(){


    $('.responsiveMap').each(function(){


        new responsiveMap($(this).attr('id'));


    });


});



