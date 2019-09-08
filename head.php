<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>..:: Visit Semarang ::.</title>
<!-- Favicon  -->
<link rel="icon" href="icon/favicon.png">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />
<meta name="author" content="" />
<!-- css -->
<link href="user/css/bootstrap.min.css" rel="stylesheet" />
<link href="user/plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />	
<link href="user/css/cubeportfolio.min.css" rel="stylesheet" />
<link href="user/css/style.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="dist/css/style.css">

<!-- Theme skin -->
<link id="t-colors" href="user/skins/default.css" rel="stylesheet" />

<!-- boxed bg -->
<link id="bodybg" href="user/bodybg/bg1.css" rel="stylesheet" type="text/css" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&key=AIzaSyB2Xd4GJtDxGPUI7nlMV-I99x5EQqYqhGc&callback=initialize"></script>
<script>

// memeriksa apakah pengguna menyediakan semua data untuk menambahkan lokasi baru
function check()
{
	if (document.getElementById('lat').value == "" || document.getElementById('long').value == "" || document.getElementById('address').value == "")
	{
		alert("Click on the map to choose location!");
		return false;
	}
	
if (document.getElementById('id_locations').value == "")
	{
		alert("Write a name for the new location!");
		return false;
	}
	
	if (document.getElementById('judul_seo').value == "")
	{
		alert("Write a description for the new location!");
		return false;
	}
	
	if (document.getElementById('judul').value == "")
	{
		alert("Write a name for the new location!");
		return false;
	}
	
	if (document.getElementById('description').value == "")
	{
		alert("Write a description for the new location!");
		return false;
	}
	

	if (document.getElementById('telepon').value == "")
	{
		alert("Write a nomor pemilik for the new location!");
		return false;
	}
	

	if (document.getElementById('gambar').value == "")
	{
		alert("Choose a gambar for the new location!");
		return false;
	}

}
</script>
<script type="text/javascript">
	
	
var geocoder;
var map;

var directionsDisplay = new google.maps.DirectionsRenderer();
var directionsService = new google.maps.DirectionsService();

function initialize()
	{

		
		var pati = new google.maps.LatLng(-6.989719, 110.422726);
		
		// define map options
		var myOptions = {
			zoom: 10,
			center: pati,

			mapTypeId: google.maps.MapTypeId.ROADMAP,
			
		};
	
	
		// initialize map
		map = new google.maps.Map(document.getElementById("map_canvas2"), myOptions);
		// menambahkan pendengar acara ketika pengguna mengklik pada peta
		google.maps.event.addListener(map, 'click', function(event) {
			findAddress(event.latLng);
		});
		
		}
		
		
		

	// menemukan alamat untuk lokasi yang diberikan
	function findAddress(loc)
	{
		geocoder = new google.maps.Geocoder(); 
		
		if (geocoder) 
		{
			geocoder.geocode({'latLng': loc}, function(results, status) 
			{
				if (status == google.maps.GeocoderStatus.OK) 
				{
					if (results[0]) 
					{
						address = results[0].formatted_address;
						
						// fill in the results in the form
						document.getElementById('lat').value = loc.lat();
						document.getElementById('long').value = loc.lng();
						document.getElementById('address').value = address;
					}
				} 
				else 
				{
					alert("Geocoder failed due to: " + status);
				}
			});
		}
	}
	
	
	
	// initialize the array of markers
	var markers = new Array();
	
	// fungsi yang menambahkan spidol untuk peta
	function addMarkers()
	{
		// get the values for the markers from the hidden elements in the form
        var ids = document.getElementById('ids').value;
		var juds = document.getElementById('juds').value;
		var lats = document.getElementById('lats').value;
		var lngs = document.getElementById('lngs').value;
		var addresses = document.getElementById('addresses').value;
		var names = document.getElementById('names').value;
		var descrs = document.getElementById('descrs').value;
		var nops = document.getElementById('nops').value;
		var gambars = document.getElementById('gambars').value;
		var jens = document.getElementById('jens').value;
	
        var is  = ids.split(";;")
		var jds = juds.split(";;")
		var las = lats.split(";;")
		var lgs = lngs.split(";;")
		var ads = addresses.split(";;")
		var nms = names.split(";;")
		var dss = descrs.split(";;")
		var nop = nops.split(";;")
		var gbr = gambars.split(";;")
		var jns  = jens.split(";;")
	
		
		
		// untuk setiap lokasi, membuat penanda baru dan infowindow untuk itu
		for (i=0; i<las.length; i++)
		{
			if (las[i] != "")
			{
				// add marker	
				set_icon(jns[i]);			
				var loc = new google.maps.LatLng(las[i],lgs[i]);
				var marker = new google.maps.Marker({
					position: loc, 
					map: window.map,
					icon: gambar_tanda,
					title: nms[i]
					
				});
			
				
				markers[i] = marker;
				
				var contentString = [
				
  				// buat tooltips tabs
				  '<div id="tabsview">',
					'<div id="tab1" class="tab_sel" onClick="javascript: displayPanel(1);" align="center">&nbsp; Photo &nbsp;</div>',
					
					
				  '</div>',
				  
				'<div class="tab_bdr">','</div>',
				// tampilan tabs 1
				  '<div class="panel" id="panel1" style="display: block;">',
				  '<span>',
				  '<ul>',				      				  
					  '<table>',
				    
					'<tr>',
					  '<td align="left">','<a id="galeri" href="foto_berita/'+gbr[i]+'" title='+nms[i]+'>','<img src="foto_berita/'+gbr[i]+'"/>'+'</a>',
					  '<h5 align="justify" title='+nms[i]+'>','<p>'+dss[i]+'</p>'+'</h5>',
					  
					  '</td>','</tr>',
					  '</table>',
					  
				  '</ul>',
				  '</span>',
				  '</div>',
				  
				 
				  
				// akhir tampilan tabs
				  
				].join('');
				
				var infowindow = new google.maps.InfoWindow;
				
				bindInfoWindow(marker, window.map, infowindow, contentString);
			}
		}
	}
	
	// membuat sambungan antara jendela info dan penanda (jendela info yang muncul ketika pengguna pergi dengan mouse di atas penanda)
	function bindInfoWindow(marker, map, infoWindow, contentString)
	{
		google.maps.event.addListener(marker, 'click', function() {
			
			map.setCenter(marker.getPosition());
			
			infoWindow.setContent(contentString);
			infoWindow.open(map, marker);
			$("#tabs").tabs();
		 });
		 
	}



function set_icon(jenisnya){
   switch(jenisnya){
         case "air.png":
            gambar_tanda = 'icon/air.png';
            break; 
         case "budaya.png":
         	gambar_tanda = 'icon/budaya.png';
         	break;
         case "lingkungan.png":
         	gambar_tanda = 'icon/lingkungan.png';
         	break;
         case "pendidikan.png":
         	gambar_tanda = "icon/pendidikan.png";
         	break;
         case "religi.png":
         	gambar_tanda = "icon/religi.png";
         	break;
		
		
    }
}
jQuery(document).ready(function(){		
	/*Function for creating the roadmap*/
			function calcRoute(start, end, mode) {
				var request = {
					origin:start,
					destination:end,
					travelMode: google.maps.TravelMode[mode]
				};
				directionsService.route(request, function(result, status) {
					if (status == google.maps.DirectionsStatus.OK) {
						directionsDisplay.setDirections(result);
					}
				});
				
				directionsDisplay.setMap(map);

				/*Show directions panel*/
				directionsDisplay.setPanel(document.getElementById("directions"));
			}
			
			jQuery('#driveit').click(function(){
			
			
				var srcAddr = jQuery('#address').val();
				var destAddr = jQuery('#to').val();
				var mode = jQuery('#mode').val();
				calcRoute(srcAddr, destAddr, mode);
			});
	
				
	});

</script>

</head>