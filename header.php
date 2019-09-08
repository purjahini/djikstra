
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>..:: Visit Semarang ::.</title>
    <!-- Favicon  -->
    <link rel="icon" href="icon/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="dist/css/style.css">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">



    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

<script type="text/javascript">    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayTime(){
        //buat object date berdasarkan waktu saat ini
        var time = new Date();
        //ambil nilai jam,
        //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
        var sh = time.getHours() + "";
        //ambil nilai menit
        var sm = time.getMinutes() + "";
        //ambil nilai detik
        var ss = time.getSeconds() + "";
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>

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

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&key=AIzaSyB2Xd4GJtDxGPUI7nlMV-I99x5EQqYqhGc&callback=initialize"></script>
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
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
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
<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>


</head>