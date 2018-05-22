@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card rounded-0">
        <div id="map" class="map" style="height:400px;"> </div>
        <div class="card-header text-center bg-dark text-white">
            <h2>Lorem.</h2>
        </div>
        <div class="card-body">
            <div class="card-block">
                <h3 class="card-title">
                    Lorem, ipsum dolor.
                </h3>
                <p class="card-text">
                    Consectetur ullamco aute nulla ipsum excepteur amet consectetur est laborum tempor duis aliquip cupidatat occaecat. Eiusmod nisi adipisicing aute aliquip irure duis magna Lorem do cupidatat esse aliquip. Eu ea non dolor ad commodo enim ex occaecat reprehenderit excepteur cillum ipsum do. Reprehenderit quis velit est minim eiusmod deserunt cillum occaecat esse ipsum laborum enim aliquip. Mollit tempor excepteur est occaecat amet pariatur.
                </p>
            </div>
            <div class="card-block mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="card-title">Lorem, ipsum dolor.</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nam doloribus ab veritatis error voluptatum sequi laborum repellat deleniti nesciunt vero deserunt facilis, inventore, sit unde? Asperiores incidunt fugit ex ipsam architecto, aperiam ad? Provident, odio cumque voluptatum alias repudiandae doloremque laudantium molestiae odit tenetur tempore totam ea accusamus et.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5 class="card-title">Lorem, ipsum dolor.</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nam doloribus ab veritatis error voluptatum sequi laborum repellat deleniti nesciunt vero deserunt facilis, inventore, sit unde? Asperiores incidunt fugit ex ipsam architecto, aperiam ad? Provident, odio cumque voluptatum alias repudiandae doloremque laudantium molestiae odit tenetur tempore totam ea accusamus et.</p>
                    </div>
                    <div class="col-md-4 text-right">
                        <h5 class="card-title">Lorem, ipsum dolor.</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nam doloribus ab veritatis error voluptatum sequi laborum repellat deleniti nesciunt vero deserunt facilis, inventore, sit unde? Asperiores incidunt fugit ex ipsam architecto, aperiam ad? Provident, odio cumque voluptatum alias repudiandae doloremque laudantium molestiae odit tenetur tempore totam ea accusamus et.</p>
                    </div>
                </div>
            </div>
            <div class="card-block mt-3">
                <h3 class="card-title text-right">
                    Lorem, ipsum dolor.
                </h3>
                <p class="card-text text-center">
                    Consectetur ullamco aute nulla ipsum excepteur amet consectetur est laborum tempor duis aliquip cupidatat occaecat. Eiusmod nisi adipisicing aute aliquip irure duis magna Lorem do cupidatat esse aliquip. Eu ea non dolor ad commodo enim ex occaecat reprehenderit excepteur cillum ipsum do. Reprehenderit quis velit est minim eiusmod deserunt cillum occaecat esse ipsum laborum enim aliquip. Mollit tempor excepteur est occaecat amet pariatur.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
@push('head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.pm@latest/dist/leaflet.pm.css" />
<link rel="stylesheet" href="http://trackingroutes/markercluster/dist/MarkerCluster.css" />
<link rel="stylesheet" href="http://trackingroutes/markercluster/dist/MarkerCluster.Default.css" />
@endpush
@push('bottom')
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.js"></script>
<script src="http://trackingroutes/markercluster/dist/leaflet.markercluster-src.js"></script>
<script src="http://trackingroutes/js/ir.js"></script>
<script>
    let map = getMap();
    let markers = new L.MarkerClusterGroup();
    map.addLayer(markers);

    let item = {!! json_encode($route) !!};

    let join = JSON.parse(item.data);
    L.geoJSON(join.route, {
        style: function(feature) {
            return { color: feature.properties.color };
        }
    }).addTo(map);
    L.geoJSON(join.points).eachLayer(function(layer) {
        layer.addTo(markers);
    });

</script>
@endpush