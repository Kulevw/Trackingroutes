@extends('crudbooster::admin_template')
@section('content')
<div class="panel panel-default">
    <div id="map" class="map" style="height:500px;">
    </div>
</div>
<table class='table table-striped table-bordered'>
    <thead>
        <tr>
            <th>Наименование</th>
            <th>Описание</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($result as $row)
            <tr>
                <td>{{$row->fullname}}</td>
                <td>{{$row->description}}</td>
                <td>
                    @if(CRUDBooster::isUpdate() && $button_edit)
                        <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("edit/$row->id")}}'>Edit</a>
                    @endif
                    
                    @if(CRUDBooster::isDelete() && $button_edit)
                        <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("delete/$row->id")}}'>Delete</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
    <input type="hidden" id="items" name="items" value={{json_encode($result->pluck('data'))}}>
</table>
@endsection
@push('head')
<link rel="stylesheet" href="https://openlayers.org/en/v4.6.4/css/ol.css" type="text/css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.css" />
<style>
    .select-route-info {
        top: .5em;
        right: .5em;
        max-width: 200px;
    }
    .ol-touch .select-route-info {
        top: 80px;
    }
</style>
@endpush
@push('bottom')
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.js"></script>
<script src="http://trackingroutes/js/ir.js"></script>
<script>
    var map = getMap();
    let items = JSON.parse($('#items').val());
    if(items) {
        items.forEach(k => {
            let route = L.geoJSON(JSON.parse(k).route, {
                style: function(feature) {
                    return { color: feature.properties.color };
                }
            }).addTo(map);
        });
    }
</script>
@endpush