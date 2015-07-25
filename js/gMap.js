google.maps.event.addDomListener(window, 'load', init);

// Allegemeine map Optionen

function init() {

	
    var mapOptions = {
        zoom: 10,
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL,
        },
        disableDoubleClickZoom: true,
        mapTypeControl: false,
        scaleControl: false,
        scrollwheel: false,
        streetViewControl: false,
        draggable : true,
        overviewMapControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: [
    {
        "featureType": "landscape",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 65
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 51
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 30
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.local",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 40
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "transit",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": -25
            },
            {
                "saturation": -100
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#ffff00"
            },
            {
                "lightness": -25
            },
            {
                "saturation": -97
            }
        ]
    }
],
    
    }


	if((/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
	  mapOptions["draggable"] = false;
	  mapOptions["zoom"] = 8;
	}

var mapsMarker = new google.maps.MarkerImage("/wp-content/themes/markusenz2014/images/mapMarker-retina2.png", null, null, null, new google.maps.Size(25,35));


// Karte
	var mapOptions = mapOptions;
	mapOptions["center"] = new google.maps.LatLng(47.0,8.4);

    var mapElement = document.getElementById('MapEnz');
    var map = new google.maps.Map(mapElement, mapOptions);
    var locations = [
        ['Altdorf', 46.877893,8.640549, '<strong>Hauptsitz<strong><br>Gurtenmundstrasse 31<br>Postfach 318<br>6460 Altdorf<br><br>Telefon: 041 879 80 00<br>Fax: 041 879 80 10<br>info@enz-ag.ch'],
        ['Seedorf', 46.889025,8.613711, '<strong>Werkhof<strong><br>Riedmattstrasse 8<br>6462 Seedorf UR'],
        ['Ennetmoos', 46.935824,8.316432, '<strong>Werkhof<strong><br>Eimatt<br>6372 Ennetmoos'],
        ['Giswil', 46.8323,8.17938, '<strong>Büro<strong><br>Dreiwässerweg 16<br>6074 Giswil'],
        ['Sarnen', 46.908577,8.26432, '<strong>Filiale<strong><br>Kernserstrasse 25<br>Postfach 1226<br>6061 Sarnen'],
        ['Stans', 46.968624,8.345078, '<strong>Filiale<strong><br>Galgenried 4<br>Postfach 357<br>6371 Stans'],
        
        ['Zug', 47.177866,8.506027, '<strong>Filiale<strong><br>Hertizentrum 6<br>6300 Zug'],
        ['Neuenkirch', 47.104753,8.202608, '<strong>Filiale<strong><br>Maiengrün<br>6206 Neuenkirch'],
        ['VEB', 46.8323,8.17938, '<strong>VEB Technik GmbH<strong><br>Dreiwässerweg 16<br>6074 Giswil<br>041 879 80 12<br>041 879 80 10<br>info@veb-technik.ch'],
        ['Engelberg', 46.821288,8.406789, '<strong>fleurenz<strong><br>Dorfstrasse 7<br>6390 Engelberg<br><br>041 637 03 07<br>041 637 02 47<br>info@fleurenz.ch'],
    ];
	
	var infowindow =  new google.maps.InfoWindow({
            content: ""
        });
	
    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            icon: mapsMarker,
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            animation: google.maps.Animation.DROP
        });
        
        bindInfoWindow(marker, map, infowindow, locations[i][3]);
       
        
    }
}
        function bindInfoWindow(marker, map, infowindow, strDescription) {
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(strDescription);
        infowindow.open(map, marker);
    });
    
}