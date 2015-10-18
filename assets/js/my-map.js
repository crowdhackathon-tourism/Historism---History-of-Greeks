$(document).ready(function() {
	
    
	InitMap();
	
	
	
	
});


function LoadMapProperty() {
	var locations = new Array();
	
	
	locations[0] = new Array([document.getElementById("d_lon").innerHTML] , [document.getElementById("d_lat").innerHTML], [document.getElementById("d_title").innerHTML] , [document.getElementById("d_image").innerHTML] , [document.getElementById("d_category").innerHTML], [document.getElementById("d_id").innerHTML]);
			    
    var markers = new Array();
    
    var mapOptions = {
        center: new google.maps.LatLng(locations[0][0], locations[0][1]),
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.SATELLITE,
		mapTypeControl: false,
        scrollwheel: false
    };

    var map = new google.maps.Map(document.getElementById('property-map'), mapOptions);

    	
       $.each(locations, function(index, location) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(location[0], location[1]),
            map: map,
            icon: 'http://html.realia.byaviators.com/assets/img/marker-transparent.png'
        });
// /<div class="infobox"><div class="image"><img style="width:120px; height:80px;" src="'+location[3]+'" alt=""></div><div class="title"><a style="font-size:16px;" href="index.php?p=detail&d='+location[5]+'">'+location[2]+'</a></div><div class="area"><span class="key"></span><span class="value"><sup>2</sup></span></div><div class="link"><a href="index.php?p=detail&d='+location[5]+'">View more</a></div></div>
	    var myOptions = {
	        content: '',
	        disableAutoPan: false,
	        maxWidth: 0,
	        pixelOffset: new google.maps.Size(-150, -170),
	        zIndex: null,
	        closeBoxURL: "",
	        infoBoxClearance: new google.maps.Size(1, 1),
	        position: new google.maps.LatLng(location[0], location[1]),
	        isHidden: false,
	        pane: "floatPane",
	        enableEventPropagation: false
	    };
	    marker.infobox = new InfoBox(myOptions);
		marker.infobox.isOpen = false;

	    var myOptions = {
	        draggable: true,
			
			content: '<div class="marker_'+location[4]+' marker"><div class="marker-inner"></div></div>',
			
			disableAutoPan: true,
			pixelOffset: new google.maps.Size(-21, -58),
			position: new google.maps.LatLng(location[0], location[1]),
			closeBoxURL: "",
			isHidden: false,
			// pane: "mapPane",
			enableEventPropagation: true
	    };
	    marker.marker = new InfoBox(myOptions);
		marker.marker.open(map, marker);
		markers.push(marker);

        google.maps.event.addListener(marker, "click", function (e) {
            var curMarker = this;

            $.each(markers, function (index, marker) {
                // if marker is not the clicked marker, close the marker
                if (marker !== curMarker) {
                    marker.infobox.close();
                    marker.infobox.isOpen = false;
                }
            });


            if(curMarker.infobox.isOpen === false) {
                curMarker.infobox.open(map, this);
                curMarker.infobox.isOpen = true;
                map.panTo(curMarker.getPosition());
            } else {
                curMarker.infobox.close();
                curMarker.infobox.isOpen = false;
            }

        });
    });
   }











function LoadMap() {
	var locations = new Array();
	var rows = document.getElementById("rows").innerHTML;
	
	for(var i=0; i<rows; i++){
		locations[i]= new Array([document.getElementById(i+"_lon").innerHTML] , [document.getElementById(i+"_lat").innerHTML], [document.getElementById(i+"_title").innerHTML] , [document.getElementById(i+"_category").innerHTML], [document.getElementById(i+"_id").innerHTML]);
		
	}
	
	var markers = new Array();
	var mapOptions = {
		center: new google.maps.LatLng(39.283705,20.401331),
		zoom: 16,
		mapTypeId: google.maps.MapTypeId.SATELLITE,
		mapTypeControl: false,
		scrollwheel: false
    };

    var map = new google.maps.Map(document.getElementById('map'), mapOptions);

    $.each(locations, function(index, location) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(location[0], location[1]),
            map: map,
            icon: 'http://html.realia.byaviators.com/assets/img/marker-transparent.png'
        });

	    var myOptions = {
	        content: '<div class="infobox"><div class="image"><img src="" alt="'+location[2]+'"></div><div class="title"><a style="font-size:16px;" href="index.php?p=detail&d='+location[4]+'">'+location[2]+'</a></div><div class="area"><span class="key"></span><span class="value"><sup></sup></span></div><div class="link"><a href="index.php?p=detail&d='+location[4]+'">View more</a></div></div>',
	        disableAutoPan: false,
	        maxWidth: 0,
	        pixelOffset: new google.maps.Size(-150, -170),
	        zIndex: null,
	        closeBoxURL: "",
	        infoBoxClearance: new google.maps.Size(1, 1),
	        position: new google.maps.LatLng(location[0], location[1]),
	        isHidden: false,
	        pane: "floatPane",
	        enableEventPropagation: false
	    };
	    marker.infobox = new InfoBox(myOptions);
		marker.infobox.isOpen = false;

	    var myOptions = {
	        draggable: true,
			
			content: '<div class="marker_'+location[3]+' marker"><div class="marker-inner"></div></div>',
			
			disableAutoPan: true,
			pixelOffset: new google.maps.Size(-21, -58),
			position: new google.maps.LatLng(location[0], location[1]),
			closeBoxURL: "",
			isHidden: false,
			// pane: "mapPane",
			enableEventPropagation: true
	    };
	    marker.marker = new InfoBox(myOptions);
		marker.marker.open(map, marker);
		markers.push(marker);

        google.maps.event.addListener(marker, "click", function (e) {
            var curMarker = this;

            $.each(markers, function (index, marker) {
                // if marker is not the clicked marker, close the marker
                if (marker !== curMarker) {
                    marker.infobox.close();
                    marker.infobox.isOpen = false;
                }
            });


            if(curMarker.infobox.isOpen === false) {
                curMarker.infobox.open(map, this);
                curMarker.infobox.isOpen = true;
                map.panTo(curMarker.getPosition());
            } else {
                curMarker.infobox.close();
                curMarker.infobox.isOpen = false;
            }

        });
    });
}

function InitMap() {
	google.maps.event.addDomListener(window, 'load', LoadMap);
    
}