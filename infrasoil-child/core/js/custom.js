var map, term_id;

jQuery(document).ready(function($){


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
	        //var res = $.parseJSON(data);
	        //console.log(data.results);
	        var reshtml = $.parseHTML(data.results);
	        get_coord_element(reshtml);
		}
        if (originalSuccess != null) {
            originalSuccess(data);
        }
    };
});


function checkurl(url) {
	var field = 'sfid';
	if(url.indexOf('?' + field + '=') != -1) {
	    return true;
	} else  {
		return false
	}
};

function get_coord_element(element) {

	var x = [];

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

	if (x.length !== 0 && x.length !== 1) {
	//console.log('!==1');console.log(x);	
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
	else if (x.length == 1) {
		//console.log('==1');console.log(x);
		var latlngbounds = new google.maps.LatLngBounds();
		var b = x[0].replace('[','').replace(']',''),
			bspl = b.split(','),
			lat = bspl[0],
			lng = bspl[1];
		var myLatLng = new google.maps.LatLng(lat,lng);
		map.panTo(myLatLng);
		map.setZoom(17);

	}else {
		//console.log('else');console.log(x);
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
	//window.map;

	if ($(".gmap").exists()) {
		function initialize() {
			//var term_id = $('.map_office').attr('data-term-id');
			//console.log("init term = " + term_id);
			
			// var beginmap = $('#gmap_portugal');
			// beginmap_Lat = beginmap.data('lat') !== '' ? parseFloat(beginmap.data('lat')) : '';
			// console.log(beginmap_Lat);
			// beginmap_Long = beginmap.data('lng') !== '' ? parseFloat(beginmap.data('lng')) : '';
			$portugal_Lat = '52.04498589999999';
			$portugal_Long = '5.566772399999991';

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
				scrollwheel     : false
			}
			// var map = new google.maps.Map(document.getElementById('g_map'), mapOptions);
			// setMarkers(map, places);
			if (document.getElementById("g_map")) {
				map = new google.maps.Map(document.getElementById("g_map"),
					mapOptions);
				map.setOptions({styles: blueOceanStyles});

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
					var marker = new google.maps.Marker({
						position : myLatLng,
						map      : map,
						icon     : image,
						draggable: false,
						img      : locations[i][3],
						clickable: true
					});
					marker.info = new google.maps.InfoWindow({
					  maxWidth: 200,
					  content: locations[i][4]
					});

					marker.setAnimation(google.maps.Animation.DROP);
					var label2 = new Label2({
						map: map
					});
					label2.bindTo('position', marker, 'position');
					label2.bindTo('text', marker, 'img');


					google.maps.event.addListener(marker, 'click', function() {  
					    // this = marker
					    var marker_map = this.getMap();
					    //this.info.open(marker_map);
					     this.info.open(marker_map, this);
					    // Note: If you call open() without passing a marker, the InfoWindow will use the position specified upon construction through the InfoWindowOptions object literal.
					});




						  // *
						  // START INFOWINDOW CUSTOMIZE.
						  // The google.maps.event.addListener() event expects
						  // the creation of the infowindow HTML structure 'domready'
						  // and before the opening of the infowindow, defined styles are applied.
						  // *

						  // google.maps.event.addListener(marker.info, 'domready', function() {

						  //   // Reference to the DIV that wraps the bottom of infowindow
						  //   var iwOuter = $('.gm-style-iw');

						  //   /* Since this div is in a position prior to .gm-div style-iw.
						  //    * We use jQuery and create a iwBackground variable,
						  //    * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
						  //   */
						  //   var iwBackground = iwOuter.prev();

						  //   // Removes background shadow DIV
						  //   iwBackground.children(':nth-child(2)').css({'display' : 'none'});

						  //   // Removes white background DIV
						  //   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

						  //   // Moves the infowindow 115px to the right.
						  //   iwOuter.parent().parent().css({left: '40px'});

						  //   // Moves the shadow of the arrow 76px to the left margin.
						  //   iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

						  //   // Moves the arrow 76px to the left margin.
						  //   iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

						  //   // Changes the desired tail shadow color.
						  //   iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

						  //   // Reference to the div that groups the close button elements.
						  //   //var iwCloseBtn = iwOuter.next();

						  //   // Apply the desired effect to the close button
						  //   //iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});

						  //   // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
						  //   if($('.iw-content').height() < 140){
						  //     $('.iw-bottom-gradient').css({display: 'none'});
						  //   }

						  //   // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
						  //   // iwCloseBtn.mouseout(function(){
						  //   //   $(this).css({opacity: '1'});
						  //   // });
						  // });

					} //end for
			} //end setMarker

		} //end initialize

		google.maps.event.addDomListener(window, 'load', initialize);

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
