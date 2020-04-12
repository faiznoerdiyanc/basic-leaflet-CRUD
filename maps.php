<head>
<title>Monitoring Covid-19 Semarang</title>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

<style>
    #map {position: absolute; top: 10; bottom: 10; left: 0; right: 0}
</style>
</head>
<body>
    <div  id = "map"></div>
<?php
    echo "Test";
?>


    <script>
        var map = L.map('map').setView([-7,110.4],12);

        L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=ndCaM208j60D5IiePLIN', {
            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
        }).addTo(map);
        
        <?php
            include "koneksi.php";
    $query = "select * from positive";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    while ($row = mysqli_fetch_array($result)) {
        cetak($row['lat'],$row['long'],$row['id']);
    }
    function cetak($latr, $longr,$id){
        $coordinate = $latr.",".$longr;
                echo "
                        var circle$id = L.circle([$coordinate],{
                        color: 'red',
                        fillColor: '#FF0000',
                        fillOpacity: 0.2,
                        radius: 500
                    }).addTo(map);
                ";
                echo "circle$id.bindPopup('ID = $id, Koordinat = $coordinate');";
    }
        ?>



    </script>



</body>

