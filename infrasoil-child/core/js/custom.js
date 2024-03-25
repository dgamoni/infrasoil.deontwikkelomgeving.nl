var map, term_id;

jQuery(document).ready(function($){

// $(document).on('mousenter', 'div.gmap', function() {
//     // do something
// });

//$('.sf-input-date').val();
// $("#dp1492335925907").on("dp.change", function(e) {
//     alert('hey');
// });

// $('#dp1492335925907').datepicker().on('changeDate', function (ev) {
//     console.log($('#dp1492335925907').val());
// });
// $(document).on('click', '#dp1492335925907', function (e) {
// 	console.log($('#dp1492335925907').val());
// });

$('.sf-input-date').each(function(index, el) {
	$(this).addClass('dat_'+index);
});
//$('.sf-input-date').first().datepicker()

if ($(".sf-input-date").exists()) {
	 $(".dat_0").datepicker()
	    .on("input change", function (e) {
	    console.log("Date changed: ", e.target.value);
	    if(!$(".dat_1").val()) {
	    	$(".dat_1").datepicker().datepicker("setDate", new Date());
	    }
	});
}



// $(document).on('input change', '.dat_0', function() {
//     console.log('.dat_0 changed');
// });

// $('.dat_0').focus(function(){
//     console.log("focus");
// });

	// $.ajaxSetup({

	//     dataFilter: function (data, type) {
	//     	//console.log(type);
	//     	//console.log(data);
	//         var res = $.parseJSON(data);
	//         var reshtml = $.parseHTML(res.results);
	//         get_coord_element(reshtml);

	// 	return data;
	// 	}
	// });


$.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
    var originalSuccess = options.success;
    options.success = function (data) {
		if(checkurl(options.url)){

			// if(getUrlVars('_sfm_infrasoil_project_date_start',options.url)) {
			// 	console.log(getUrlVars('_sfm_infrasoil_project_date_start',options.url));			
			// 	console.log(getUrlVars('_sfm_infrasoil_project_date_start',options.url).split('+'));
			// 	var sfm_infrasoil_project_date_start = getUrlVars('_sfm_infrasoil_project_date_start',options.url).split('+');
			// 	if(sfm_infrasoil_project_date_start[1] == ''){
			// 		console.log('setup');
			// 		//console.log(options.url);
			// 		//options.url = options.url+'&_sfm_infrasoil_project_date_start='+sfm_infrasoil_project_date_start[0]+'+'+sfm_infrasoil_project_date_start[0];
			// 		console.log(options.url);
			// 	}
			// }


	        //var res = $.parseJSON(data);
	        //console.log(data.results);

	      //   // fix grid
	      //   //console.log(getParameterByName_('sfid',options.url));
	      //   var serach_id = getParameterByName_('sfid',options.url);
	      //   if(serach_id == '1441') {
			    // var items = $('.search-filter-results .grid-entry').not('.projectchild');
			    // //console.log(items);
			    // items.each(function(index, el) {
			    //     $(this).addClass('element_'+index);
			    // });
	      //   }//end


	        var zoom = false;
	        if(    getUrlVars('_sfm_infrasoil_project_date_start',options.url)
	        	|| getUrlVars('_sft_project_expertises',options.url)
	        	|| getUrlVars('_sft_project_areas',options.url)) {
	        		console.log('yes');
	        		zoom = false;
	        }

	        var reshtml = $.parseHTML(data.results);
	        get_coord_element(reshtml, zoom);


		}
        if (originalSuccess != null) {
            originalSuccess(data);
        }
    };
});

function checkurl_field(url,field) {
	if(url.indexOf('?' + field + '=') != -1) {
	    return true;
	} else  {
		return false
	}
};

function checkurl(url) {
	var field = 'sfid';
	if(url.indexOf('?' + field + '=') != -1) {
	    return true;
	} else  {
		return false
	}
};

function getUrlVars(sParam, url) {
    var sPageURL = decodeURIComponent(url.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

function getParameterByName_(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function get_coord_element(element, zoom) {

	var x = [];
	$portugal_Lat = '52.763344';
	$portugal_Long = '5.658109';

	$(element).each(function(m){
		var el = $(this),
			long = el.data('lng'),
			lat = el.data('lat');
			if(long && lat){
				var e = '['+lat+','+long+']';
				x[m] = e;
			}
		// var e = '['+lat+','+long+']';
		// x[m] = e;
	});
	console.log(x);

	x.clean(undefined);
	console.log(x);

	//var bounds = [];
	//setMapOnAll(null);
	 

	if (x.length !== 0 && x.length !== 1) {
	//console.log('!==1');console.log(x);

	hideMarker();

		var latlngbounds = new google.maps.LatLngBounds();

		for (var i = 0; i < x.length; i++) {

			var b = x[i].replace('[','').replace(']',''),
				bspl = b.split(','),
				lat = bspl[0],
				lng = bspl[1];

			var myLatLng = new google.maps.LatLng(lat,lng);
			latlngbounds.extend(myLatLng);

			showMarker(myLatLng);
		}
		//map.setCenter(latlngbounds.getCenter(), map.fitBounds(latlngbounds));
		if(zoom) {
			map.setCenter(latlngbounds.getCenter(), map.fitBounds(latlngbounds));
			map.setZoom(8);
			//console.log('setzoom 9');
		} else {
			var global_center = new google.maps.LatLng($portugal_Lat, $portugal_Long);
			map.setCenter(global_center);
			map.setZoom(8);
		}

	}
	else if (x.length == 1) {

	hideMarker();

		//console.log('==1');console.log(x);
		var latlngbounds = new google.maps.LatLngBounds();

		var b = x[0].replace('[','').replace(']',''),
			bspl = b.split(','),
			lat = bspl[0],
			lng = bspl[1];
		var myLatLng = new google.maps.LatLng(lat,lng);
		//map.panTo(myLatLng);
		//map.setZoom(17);
		//console.log(map.getBounds().contains(myLatLng));
		showMarker(myLatLng);
		if(zoom) { 
			map.panTo(myLatLng);
			map.setZoom(9);
			//console.log('setzoom 9');
		} else {
			var global_center = new google.maps.LatLng($portugal_Lat, $portugal_Long);
			map.setCenter(global_center);
			map.setZoom(8);	
		}

	}else {
		//console.log('else');console.log(x);
	}
}

function hideMarker() {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setVisible(false);
    //console.log(markers[i].getPosition());
  }
}

function showMarker(myLatLng) {
  for (var i = 0; i < markers.length; i++) {
    //console.log(markers[i].getPosition());
    if (markers[i].getPosition().equals(myLatLng)) {
    	//console.log(markers[i].getPosition()+'true');
    	markers[i].setVisible(true);
    }
  }
}


function get_coord() {

	var x = [];

	$(document).find('.coord').each(function(m){
		var el = $(this),
			long = el.data('lng'),
			lat = el.data('lat');
			if(long && lat){
				var e = '['+lat+','+long+']';
				x[m] = e;
			}
		// var e = '['+lat+','+long+']';
		// x[m] = e;
	});
	console.log(x);

	if (x.length !== 1) {

		var latlngbounds = new google.maps.LatLngBounds();
		for (var i = 0; i < x.length; i++) {

			var b = x[i].replace('[','').replace(']',''),
				bspl = b.split(','),
				lat = bspl[0],
				lng = bspl[1];

			var myLatLng = new google.maps.LatLng(lat,lng);
			latlngbounds.extend(myLatLng);

		}
		map.setCenter(latlngbounds.getCenter(), map.fitBounds(latlngbounds));

	}
	else {

		var latlngbounds = new google.maps.LatLngBounds();
		var b = x[0].replace('[','').replace(']',''),
			bspl = b.split(','),
			lat = bspl[0],
			lng = bspl[1];
		var myLatLng = new google.maps.LatLng(lat,lng);
		map.panTo(myLatLng);
		map.setZoom(17);

	}
}


	
	/**
	 *
	 *  map
	 *
	 */



	var places = [];
	var markers = [];
	var mylatlngbounds = new google.maps.LatLngBounds();
	//window.map;

	if ($(".gmap").exists()) {
		function initialize() {
			//var term_id = $('.map_office').attr('data-term-id');
			//console.log("init term = " + term_id);
			
			// var beginmap = $('#gmap_portugal');
			// beginmap_Lat = beginmap.data('lat') !== '' ? parseFloat(beginmap.data('lat')) : '';
			// console.log(beginmap_Lat);
			// beginmap_Long = beginmap.data('lng') !== '' ? parseFloat(beginmap.data('lng')) : '';
			$portugal_Lat = '52.763344';
			$portugal_Long = '5.658109';


			var blueOceanStyles = [
			  {
			    featureType: "all",
			    stylers: [
			      { saturation: -80 }
			    ]
			  },{
			    featureType: "road.arterial",
			    elementType: "geometry",
			    stylers: [
			      { hue: "#00ffee" },
			      { saturation: 50 }
			    ]
			  },{
			    featureType: "poi.business",
			    elementType: "labels",
			    stylers: [
			      { visibility: "off" }
			    ]
			  }
			];
			
			var mapOptions = {
				zoom            : 8,
				center          : new google.maps.LatLng($portugal_Lat, $portugal_Long),
				disableDefaultUI: false,
				scaleControl    : false,
				scrollwheel     : false,
				mapTypeId		: 'satellite',
				// panControl		: true,
				// zoomControl		: true,
				// draggable		: true,
			}
			// var map = new google.maps.Map(document.getElementById('g_map'), mapOptions);
			// setMarkers(map, places);
			if (document.getElementById("g_map")) {
				map = new google.maps.Map(document.getElementById("g_map"),
					mapOptions);
				//map.setOptions({styles: blueOceanStyles});

				jQuery.ajax({
					url     : '/wp-admin/admin-ajax.php',
					type    : 'POST',
					dataType: 'json',
					data    : {
						'action': 'get_firms_places',
						//'term_id': term_id
					},
					success : function (response) {
						console.log(response);
						places = response;
						setMarkers(map, places);
					}


				});
			}

			var map_marker;
			var markers_location = [];

			function Label2(opt_options) {
				this.setValues(opt_options);
				var div = this.div_ = document.createElement('div');
				div.style.cssText = 'position: absolute; display: none';
			}
			;
			Label2.prototype = new google.maps.OverlayView;
			Label2.prototype.onAdd = function () {
				var pane = this.getPanes();
				pane.overlayImage.appendChild(this.div_);
				var me = this;
				this.listeners_ = [
					google.maps.event.addListener(this, 'position_changed',
						function () {
							me.draw();
						}),
					google.maps.event.addListener(this, 'text_changed',
						function () {
							me.draw();
						})
				];
			};
			Label2.prototype.onRemove = function () {
				this.div_.parentNode.removeChild(this.div_);
				for (var i = 0, I = this.listeners_.length; i < I; ++i) {
					google.maps.event.removeListener(this.listeners_[i]);
				}
			};
			Label2.prototype.draw = function () {
				var projection = this.getProjection();
				var position = projection.fromLatLngToDivPixel(this.get('position'));
				var div = this.div_;
				div.className = 'gm_i_thumb';
				div.style.left = position.x + 'px';
				div.style.top = position.y + 'px';
				div.style.display = 'block';
				div.style.background = 'transparent';
				div.style.position = 'absolute';
				div.style.paddingLeft = '0px';
				div.style.cursor = 'pointer';
				div.style.width = '28px';
				div.style.height = '38px';
				div.style.marginTop = '-38px';
				div.style.marginLeft = '-14px';
				div.style.zIndex = '999';
				if (this.get('text')) {
					this.div_.innerHTML = this.get('text').toString();
				}
			};




			function setMarkers(map, locations) {
				var latlngbounds = new google.maps.LatLngBounds();
				//mylatlngbounds = new google.maps.LatLngBounds();
				// var image = new google.maps.MarkerImage('',
				// 	new google.maps.Size(72, 72),
				// 	new google.maps.Point(0, 0),
				// 	new google.maps.Point(0, 37));
				var image = {
			        url: js_url.imgurl+'marker.png', 
			    };

	var closeDelayed = false;
    var closeDelayHandler = function() {
        $(marker.info.getWrapper()).removeClass('active');
        setTimeout(function() {
            closeDelayed = true;
            marker.info.close();
        }, 300);
    };

				for (var i = 0; i < places.length; i++) {
					var myLatLng = new google.maps.LatLng(locations[i][1], locations[i][2], locations[i][3]);
					latlngbounds.extend(myLatLng);
					//mylatlngbounds.extend(myLatLng);
					//console.log(locations[i][5]);
					if(locations[i][5]) {
						image = {
					        url: js_url.imgurl+'map-big-project.png',
					    };
					} else {
						image = {
					        url: js_url.imgurl+'marker.png', 
					    };
					}
					var marker = new google.maps.Marker({
						position : myLatLng,
						map      : map,
						icon     : image,
						draggable: false,
						img      : locations[i][3],
						clickable: true,
						//optimized: false
					});

					mylatlngbounds.extend(marker.getPosition());


//SnazzyInfoWindow

    // Add a Snazzy Info Window to the marker
    marker.info = new SnazzyInfoWindow({
        marker: marker,
        wrapperClass: 'custom-window',
        panOnOpen: true,
        // offset: {
        //     //top: '-72px'
        // },
        // edgeOffset: {
        //     top: 50,
        //     right: 60,
        //     bottom: 50
        // },
        //border: false,
        //closeButtonMarkup: '<button type="button" class="custom-close">&#215;</button>',
		content: locations[i][4],
        // callbacks: {
        //     open: function() {
        //         $(this.getWrapper()).addClass('open');
        //     },
        //     afterOpen: function() {
        //         var wrapper = $(this.getWrapper());
        //         wrapper.addClass('active');
        //         wrapper.find('.custom-close').on('click', closeDelayHandler);
        //     },
        //     beforeClose: function() {
        //         if (!closeDelayed) {
        //             closeDelayHandler();
        //             return false;
        //         }
        //         return true;
        //     },
        //     afterClose: function() {
        //         var wrapper = $(this.getWrapper());
        //         wrapper.find('.custom-close').off();
        //         wrapper.removeClass('open');
        //         closeDelayed = false;
        //     }
        // }
    });

					// marker.info = new google.maps.InfoWindow({
					//   maxWidth: 200,
					//   content: locations[i][4],
					// });

					marker.setAnimation(google.maps.Animation.DROP);
					var label2 = new Label2({
						map: map
					});
					label2.bindTo('position', marker, 'position');
					label2.bindTo('text', marker, 'img');

					markers.push(marker);

					google.maps.event.addListener(marker, 'click', function() {  
					    // this = marker
					    var marker_map = this.getMap();
					    //this.info.open(marker_map);
					    //console.log(marker_map);
						hideAllInfoWindows(map);
					     this.info.open(marker_map, this);
					    // Note: If you call open() without passing a marker, the InfoWindow will use the position specified upon construction through the InfoWindowOptions object literal.
					});




						  // *
						  // START INFOWINDOW CUSTOMIZE.
						  // The google.maps.event.addListener() event expects
						  // the creation of the infowindow HTML structure 'domready'
						  // and before the opening of the infowindow, defined styles are applied.
						  // *

						  google.maps.event.addListener(marker.info, 'domready', function() {

						    // Reference to the DIV that wraps the bottom of infowindow
						    var iwOuter = $('.gm-style-iw');

						    /* Since this div is in a position prior to .gm-div style-iw.
						     * We use jQuery and create a iwBackground variable,
						     * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
						    */
						    var iwBackground = iwOuter.prev();

						    // Removes background shadow DIV
						    iwBackground.children(':nth-child(2)').css({'display' : 'none'});


						    // Removes white background DIV
						    iwBackground.children(':nth-child(4)').css({'display' : 'none'});

						    // Moves the infowindow 115px to the right.
						    //iwOuter.parent().parent().css({maxWidth: '200px !important'});
						    iwOuter.parent().parent().css({left: '40px'});

						    // Moves the shadow of the arrow 76px to the left margin.
						    iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

						    // Moves the arrow 76px to the left margin.
						    iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

						    // Changes the desired tail shadow color.
						    iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

						    // Reference to the div that groups the close button elements.
						    var iwCloseBtn = iwOuter.next();

						    // Apply the desired effect to the close button
						    //iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
						    iwCloseBtn.css({ right: '53px', top: '16px'});

						    // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
						    if($('.iw-content').height() < 140){
						      $('.iw-bottom-gradient').css({display: 'none'});
						    }

						    // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
						    // iwCloseBtn.mouseout(function(){
						    //   $(this).css({opacity: '1'});
						    // });
						  });

					} //end for
					map.setCenter(latlngbounds.getCenter(), map.fitBounds(latlngbounds));
					map.setZoom(8);
					var global_center = new google.maps.LatLng($portugal_Lat, $portugal_Long);
					map.setCenter(global_center);


					//mapsObject.panBy(200, 100);

					//map.fitBounds(mylatlngbounds);

					//console.log(latlngbounds.getCenter());
					//console.log(map.fitBounds(mylatlngbounds));

					// var gmap_ww = $(".searchandfilter_content_map").width();
					// console.log(gmap_ww);
					//   if(gmap_ww<600){
					//   	 map.setZoom(6);
					//   }

					//var mycenter = new google.maps.LatLng(latlngbounds.getCenter(), map.fitBounds(latlngbounds));

			} //end setMarker

			function hideAllInfoWindows(map) {
			   markers.forEach(function(marker) {
			     marker.info.close(map, marker);
			  });
			};

			// google.maps.event.addDomListener(map, 'idle', function() {
			//     center = map.getCenter();
			// });

			//Resize Function
			google.maps.event.addDomListener(window, "resize", function() {
				var center = map.getCenter();
				//console.log(center);
				//var center = map.getBounds().getCenter();
				resizeMap();
				google.maps.event.trigger(map, "resize");
				map.setCenter(center);

 				//map.panTo(mylatlngbounds);
 				//console.log(mylatlngbounds);

				//map.setCenter(latlngbounds.getCenter(), map.fitBounds(latlngbounds));

				//var location = new google.maps.LatLng(center .lat(), center .lng());
				//map.setCenter(location);
				// var latLng_ = new google.maps.LatLng(center .lat(), center .lng());
			 //    map.setCenter(latLng_);
			});

			// google.maps.event.addListenerOnce(map, "center_changed", function() {
			// 	var oldCenter = map.getCenter();
			// 	map.setCenter(oldCenter);
			// });

			// google.maps.event.addListener(map, 'click', function() {
			//     if (marker.info) {
			//         marker.info.close();
			//     }
			// });

			function resizeMap(){

			  var h = window.innerHeight;
			  var w = window.innerWidth;
			  var gmap_w = $(".searchandfilter_content_map").width();
			  var gmap_h = $(".searchandfilter_content_map").height();
			  console.log(gmap_w);
			  console.log(w);
			  $("#g_map").width(gmap_w);
			  //map.setCenter(latlngbounds.getCenter(), map.fitBounds(latlngbounds));

			  // if(gmap_w<600){
			  // 	 map.setZoom(7);
			  // } else {
			  // 	 map.setZoom(8);
			  // }

			  //$("#g_map").height(h-100);

			}

			function resizeMap_init(){

			  var h = window.innerHeight;
			  var w = window.innerWidth;
			  var gmap_w = $(".searchandfilter_content_map").width();
			  var gmap_h = $(".searchandfilter_content_map").height();
			  console.log('init'+gmap_w);
			  $("#g_map").width(gmap_w);
			  //map.setZoom(7);
				//map.setCenter(mylatlngbounds.getCenter(), map.fitBounds(mylatlngbounds));
			  // if(gmap_w<600){
			  // 	 map.setZoom(7);
			  // } else {
			  // 	 map.setZoom(8);
			  // }

			  //$("#g_map").height(h-100);

			  	var center_ = map.getCenter();
				google.maps.event.trigger(map, "resize");
				map.setCenter(center_);

			}

			//resizeMap();
			resizeMap_init();

					//map.setCenter(mylatlngbounds.getCenter(), map.fitBounds(mylatlngbounds));
					//mapsObject.panBy(200, 100);
					//map.fitBounds(mylatlngbounds);

		} //end initialize

		google.maps.event.addDomListener(window, 'load', initialize);

	} // end map


// g_map_widget

	var places = [];
	var markers = [];
	//window.map;

	if ($(".g_map_widget").exists()) {
		function initialize_widget() {
			//var term_id = $('.map_office').attr('data-term-id');
			//console.log("init term = " + term_id);
			
			// var beginmap = $('#gmap_portugal');
			// beginmap_Lat = beginmap.data('lat') !== '' ? parseFloat(beginmap.data('lat')) : '';
			// console.log(beginmap_Lat);
			// beginmap_Long = beginmap.data('lng') !== '' ? parseFloat(beginmap.data('lng')) : '';
			$portugal_Lat = '52.763344';
			$portugal_Long = '5.658109';

			var blueOceanStyles = [
			  {
			    featureType: "all",
			    stylers: [
			      { saturation: -80 }
			    ]
			  },{
			    featureType: "road.arterial",
			    elementType: "geometry",
			    stylers: [
			      { hue: "#00ffee" },
			      { saturation: 50 }
			    ]
			  },{
			    featureType: "poi.business",
			    elementType: "labels",
			    stylers: [
			      { visibility: "off" }
			    ]
			  }
			];
			
			var mapOptions = {
				zoom            : 8,
				center          : new google.maps.LatLng($portugal_Lat, $portugal_Long),
				disableDefaultUI: false,
				scaleControl    : false,
				scrollwheel     : false,
				mapTypeId		: 'satellite'
			}
			// var map = new google.maps.Map(document.getElementById('g_map'), mapOptions);
			// setMarkers(map, places);
			if (document.getElementById("g_map")) {
				map = new google.maps.Map(document.getElementById("g_map"),
					mapOptions);
				//map.setOptions({styles: blueOceanStyles});

				jQuery.ajax({
					url     : '/wp-admin/admin-ajax.php',
					type    : 'POST',
					dataType: 'json',
					data    : {
						'action': 'get_firms_places',
						//'term_id': term_id
					},
					success : function (response) {
						console.log(response);
						places = response;
						setMarkers(map, places);
					}


				});
			}

			var map_marker;
			var markers_location = [];

			function Label2(opt_options) {
				this.setValues(opt_options);
				var div = this.div_ = document.createElement('div');
				div.style.cssText = 'position: absolute; display: none';
			}
			;
			Label2.prototype = new google.maps.OverlayView;
			Label2.prototype.onAdd = function () {
				var pane = this.getPanes();
				pane.overlayImage.appendChild(this.div_);
				var me = this;
				this.listeners_ = [
					google.maps.event.addListener(this, 'position_changed',
						function () {
							me.draw();
						}),
					google.maps.event.addListener(this, 'text_changed',
						function () {
							me.draw();
						})
				];
			};
			Label2.prototype.onRemove = function () {
				this.div_.parentNode.removeChild(this.div_);
				for (var i = 0, I = this.listeners_.length; i < I; ++i) {
					google.maps.event.removeListener(this.listeners_[i]);
				}
			};
			Label2.prototype.draw = function () {
				var projection = this.getProjection();
				var position = projection.fromLatLngToDivPixel(this.get('position'));
				var div = this.div_;
				div.className = 'gm_i_thumb';
				div.style.left = position.x + 'px';
				div.style.top = position.y + 'px';
				div.style.display = 'block';
				div.style.background = 'transparent';
				div.style.position = 'absolute';
				div.style.paddingLeft = '0px';
				div.style.cursor = 'pointer';
				div.style.width = '28px';
				div.style.height = '38px';
				div.style.marginTop = '-38px';
				div.style.marginLeft = '-14px';
				div.style.zIndex = '999';
				if (this.get('text')) {
					this.div_.innerHTML = this.get('text').toString();
				}
			};




			function setMarkers(map, locations) {
				var latlngbounds = new google.maps.LatLngBounds();
				// var image = new google.maps.MarkerImage('',
				// 	new google.maps.Size(72, 72),
				// 	new google.maps.Point(0, 0),
				// 	new google.maps.Point(0, 37));
				var image = {
			        url: js_url.imgurl+'marker.png', 
			    };
			    
				for (var i = 0; i < places.length; i++) {
					var myLatLng = new google.maps.LatLng(locations[i][1], locations[i][2], locations[i][3]);
					latlngbounds.extend(myLatLng);
					//console.log(locations[i][5]);
					if(locations[i][5]) {
						image = {
					        url: js_url.imgurl+'map-big-project.png', 
					    };
					} else {
						image = {
					        url: js_url.imgurl+'marker.png', 
					    };						
					}
					var marker = new google.maps.Marker({
						position : myLatLng,
						map      : map,
						icon     : image,
						draggable: false,
						img      : locations[i][3],
						clickable: true
					});
					// marker.info = new google.maps.InfoWindow({
					//   maxWidth: 200,
					//   content: locations[i][4]
					// });

    // Add a Snazzy Info Window to the marker
    marker.info = new SnazzyInfoWindow({
        marker: marker,
        wrapperClass: 'custom-window',
        panOnOpen: true,
		content: locations[i][4],
    });

					marker.setAnimation(google.maps.Animation.DROP);
					var label2 = new Label2({
						map: map
					});
					label2.bindTo('position', marker, 'position');
					label2.bindTo('text', marker, 'img');

					markers.push(marker);

					google.maps.event.addListener(marker, 'click', function() {  
					    // this = marker
					    var marker_map = this.getMap();
					    //this.info.open(marker_map);
					    //console.log(marker_map);
						hideAllInfoWindows(map);
					     this.info.open(marker_map, this);
					    // Note: If you call open() without passing a marker, the InfoWindow will use the position specified upon construction through the InfoWindowOptions object literal.
					});




						  // *
						  // START INFOWINDOW CUSTOMIZE.
						  // The google.maps.event.addListener() event expects
						  // the creation of the infowindow HTML structure 'domready'
						  // and before the opening of the infowindow, defined styles are applied.
						  // *

						  google.maps.event.addListener(marker.info, 'domready', function() {

						    // Reference to the DIV that wraps the bottom of infowindow
						    var iwOuter = $('.gm-style-iw');

						    /* Since this div is in a position prior to .gm-div style-iw.
						     * We use jQuery and create a iwBackground variable,
						     * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
						    */
						    var iwBackground = iwOuter.prev();

						    // Removes background shadow DIV
						    iwBackground.children(':nth-child(2)').css({'display' : 'none'});


						    // Removes white background DIV
						    iwBackground.children(':nth-child(4)').css({'display' : 'none'});

						    // Moves the infowindow 115px to the right.
						    //iwOuter.parent().parent().css({maxWidth: '200px !important'});
						    iwOuter.parent().parent().css({left: '40px'});

						    // Moves the shadow of the arrow 76px to the left margin.
						    iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

						    // Moves the arrow 76px to the left margin.
						    iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

						    // Changes the desired tail shadow color.
						    iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

						    // Reference to the div that groups the close button elements.
						    var iwCloseBtn = iwOuter.next();

						    // Apply the desired effect to the close button
						    //iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
						    iwCloseBtn.css({ right: '53px', top: '16px'});

						    // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
						    if($('.iw-content').height() < 140){
						      $('.iw-bottom-gradient').css({display: 'none'});
						    }

						    // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
						    // iwCloseBtn.mouseout(function(){
						    //   $(this).css({opacity: '1'});
						    // });
						  });

					} //end for
					map.setCenter(latlngbounds.getCenter(), map.fitBounds(latlngbounds));
			} //end setMarker

			function hideAllInfoWindows(map) {
			   markers.forEach(function(marker) {
			     marker.info.close(map, marker);
			  });
			};

			//Resize Function
			google.maps.event.addDomListener(window, "resize", function() {
				var center = map.getCenter();
				resizeMap();
				google.maps.event.trigger(map, "resize");
				map.setCenter(center);
			});

			// google.maps.event.addListener(map, 'click', function() {
			//     if (marker.info) {
			//         marker.info.close();
			//     }
			// });

			function resizeMap(){

			  var h = window.innerHeight;
			  var w = window.innerWidth;
			  var gmap_w = $(".project_mapwidget").width();
			  console.log(gmap_w);
			  $("#g_map").width(gmap_w);
			  //$("#g_map").height(h-50);

			}

			resizeMap();

		} //end initialize

		google.maps.event.addDomListener(window, 'load', initialize_widget);

	} // end map
	/**
	 * click sidebar go to map
	 */
	$(document).on('click', '.adres a', function () {

		$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .content .list').removeClass('active');
		$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .content .gmap').addClass('active');
		$('.map_office').parents('ul').find('li').removeClass('active');
		$('.map_office').parents('ul').find('li:first').addClass('active');

		var fl = $('.contacts_elements');
		fl.find('a').each(function(){
			var a = $(this),
				da = a.data('map-url');
			a.attr('href',da);
		});

		var el = $(this),
			Lat = el.data('lat') !== '' ? parseFloat(el.data('lat')) : '',
			Long = el.data('lng') !== '' ? parseFloat(el.data('lng')) : '',
			hash = '#gmap_'+Lat+'_'+Long+'_'+ el.parents('.box').attr('id');

		var myLatlng = new google.maps.LatLng(Lat, Long);
		map.panTo(myLatlng);
		map.setZoom(15);

		//window.location.hash = hash;
	});

	// ajax
	var click_load = 0;

	
	$(document).on('click', '.firm_adress li a, .region-link, .contacts_content_with_sidebar .searchresults .show a, .contacts_content_with_sidebar .searchresults li a', function (e) {
		var obj = $(this),
			term_id = obj.data('tax-id'),
			href = obj.attr('href'),
			hs = href.split('#'),
			hash = hs[1];

		e.preventDefault();
		console.log(obj);

		$('#firms_list').css({
			'opacity': 0.3
		});

		window.location.hash = hs[1];

		$.ajax({
			type    : "POST",
			url     : "/wp-admin/admin-ajax.php",
			dataType: "json",
			data    : "action=deco_get_firms_by_region&term_id=" + term_id,
			success : function (a) {

				if (a.content) {
					$('#firms_list').html(a.content).css({
						'opacity': '1'
					});

					var x = [];

					$(a.content).find('.smap-link').each(function(m){
						var el = $(this),
							long = el.data('lng'),
							lat = el.data('lat');
						var e = '['+lat+','+long+']';
						x[m] = e;
					});

					if (x.length !== 1) {

						var latlngbounds = new google.maps.LatLngBounds();
						for (var i = 0; i < x.length; i++) {

							var b = x[i].replace('[','').replace(']',''),
								bspl = b.split(','),
								lat = bspl[0],
								lng = bspl[1];

							var myLatLng = new google.maps.LatLng(lat,lng);
							latlngbounds.extend(myLatLng);

						}
						map.setCenter(latlngbounds.getCenter(), map.fitBounds(latlngbounds));

					}
					else {

						var latlngbounds = new google.maps.LatLngBounds();
						var b = x[0].replace('[','').replace(']',''),
							bspl = b.split(','),
							lat = bspl[0],
							lng = bspl[1];
						var myLatLng = new google.maps.LatLng(lat,lng);
						map.panTo(myLatLng);
						map.setZoom(17);

					}

					if(!obj.hasClass('region-link')){
						$('.firm_adress a').removeClass('current');
						obj.addClass('current');
					}

					$('body,html').animate({scrollTop: $('.content').offset().top - 50}, 400);

				}

			}
		});

	}); // end ajax





}); //end ready

// helper
jQuery.fn.exists = function(){return this.length>0;}

Array.prototype.clean = function(deleteValue) {
  for (var i = 0; i < this.length; i++) {
    if (this[i] == deleteValue) {         
      this.splice(i, 1);
      i--;
    }
  }
  return this;
};
