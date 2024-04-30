<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        .text-center {
            text-align: center;
        }
        #map {
            width: '100%';
            height: 400px;
        }
    </style>
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />
</head>

<body>
    <h1 class='text-center'>Laravel Leaflet Maps</h1>
    <div id='map'></div>

    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
    <script>
        var greenIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        const dataCust = [
            @foreach($customer as $row)
                 L.marker([ {{ $row->LA }}, {{ $row->LO }} ], { icon: greenIcon }).bindPopup( 
                    'Kode : {{ $row->code }}<br>'+
                    'Nama : {{ $row->name }}<br>'+
                    'Telp : {{ $row->phone }}<br>'+
                    'Alamat : {{ $row->address }}<br>'+
                    'Area : {{ $row->area }}<br>'+
                    'Sub Area : {{ $row->subarea }}<br>'+
                    'Cabang : {{ $row->branch_name }}'
                    ) ,
            @endforeach
        ];
        const dataOutlet = [
            @foreach($outlet as $row1)
                L.marker([ {{ $row1->LA }}, {{ $row1->LO }} ]).bindPopup( 
                    'Kode : {{ $row1->code }}<br>'+
                    'Nama : {{ $row1->name }}<br>'+
                    'Telp : {{ $row1->phone }}<br>'+
                    'Alamat : {{ $row1->address }}<br>'+
                    'Area : {{ $row1->area }}<br>'+
                    'Sub Area : {{ $row1->subarea }}<br>'+
                    'Cabang : {{ $row1->branch_name }}'
                    ) ,
            @endforeach
        ];

        var cust = L.layerGroup(dataCust);
        var outlet = L.layerGroup(dataOutlet);
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        });

        var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team hosted by OpenStreetMap France'});

        var map = L.map('map', {
            center: [-6.14848, 106.714381],
            zoom: 10,
            layers: [osm, cust]
        });

        var baseMaps = {
            "OpenStreetMap": osm,
            "OpenStreetMap.HOT": osmHOT
        };

        var overlayMaps = {
            "Toko ( {{$customer->count()}} )": cust
        };

        var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);
        // var polyline = L.polyline(dataCust, {color: 'red'}).addTo(map);
        // map.fitBounds(polyline.getBounds());

        var baseMaps = {
            "OpenStreetMap": osm,
            "<span style='color: red'>OpenStreetMap.HOT</span>": osmHOT
        };

        // var crownHill = L.marker([39.75, -105.09]).bindPopup('This is Crown Hill Park.'),
        //     rubyHill = L.marker([39.68, -105.00]).bindPopup('This is Ruby Hill Park.');
            
        // var parks = L.layerGroup([crownHill, rubyHill]);
        var openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data: © OpenStreetMap contributors, SRTM | Map style: © OpenTopoMap (CC-BY-SA)'
        });

        layerControl.addBaseLayer(openTopoMap, "OpenTopoMap");
        layerControl.addOverlay(outlet, "Gerai ( {{$outlet->count()}} )");
        // let map, markers = [];
        // /* ----------------------------- Initialize Map ----------------------------- */
        // function initMap() {
        //     map = L.map('map', {
        //         center: {
        //             lat: 28.626137,
        //             lng: 79.821603,
        //         },
        //         zoom: 15
        //     });

        //     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //         attribution: '© OpenStreetMap'
        //     }).addTo(map);

        //     map.on('click', mapClicked);
        //     initMarkers();
        // }
        // initMap();

        // /* --------------------------- Initialize Markers --------------------------- */
        // function initMarkers() {
        //     const initialMarkers = ;
        //     const track = ;

        //     console.log(track);

        //     for (let index = 0; index < initialMarkers.length; index++) {

        //         const data = initialMarkers[index];
        //         const marker = generateMarker(data, index);
        //         marker.addTo(map).bindPopup(`<b>${data.position.lat},  ${data.position.lng}</b>`);
        //         map.panTo(data.position);
        //         markers.push(marker)
        //     }
        // }

        // function generateMarker(data, index) {
        //     return L.marker(data.position, {
        //             draggable: data.draggable
        //         })
        //         .on('click', (event) => markerClicked(event, index))
        //         .on('dragend', (event) => markerDragEnd(event, index));
        // }

        // /* ------------------------- Handle Map Click Event ------------------------- */
        // function mapClicked($event) {
        //     console.log(map);
        //     console.log($event.latlng.lat, $event.latlng.lng);
        // }

        // /* ------------------------ Handle Marker Click Event ----------------------- */
        // function markerClicked($event, index) {
        //     console.log(map);
        //     console.log($event.latlng.lat, $event.latlng.lng);
        // }

        // /* ----------------------- Handle Marker DragEnd Event ---------------------- */
        // function markerDragEnd($event, index) {
        //     console.log(map);
        //     console.log($event.target.getLatLng());
        // }
    </script>
</body>

</html>
