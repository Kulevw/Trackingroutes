@extends('crudbooster::admin_template')
@section('content')
		<div class="panel panel-default">
			<div class="panel-heading">
				Add Form
			</div>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">КИ - объект</h5>
						</div>
						<div class="modal-body">
							<form>
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Наименование:</label>
								<input type="text" class="form-control" id="obj-name">
							</div>
							<div class="form-group">
								<label for="message-text" class="col-form-label">Описание:</label>
								<textarea class="form-control" id="obj-desc"></textarea>
							</div>
							<div class="form-group">
								<label for="message-text" class="col-form-label">Описание:</label>
								<input type="file" class="form-control-file" id="recipient-name">
							</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" id="save-obj" class="btn btn-primary" data-dismiss="modal">Сохранить</button>
							<button type="button" id="cancel-obj" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
						</div>
					</div>
				</div>
			</div>
			<form id="mainform" method="post" action="{{ CRUDBooster::mainpath('add-save') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div id="panelBody" class="panel-body">
					<div class="form-group">
						<label for="fullname">Наименование</label>
						<input type="text" name="fullname" id="fullname" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="description">Описание</label>
						<textarea name="description" id="description" class="form-control" style="resize: vertical;" required></textarea>
					</div>
					<div class="form-group">
						<label for="color">Цвет</label>
						<input type="color" name="color" id="color" value="#FF0000" class="form-control-color" required>
					</div>
					<div id="editor" class="form-group">
						<div id="map" class="map" style="height: 500px;">							
						</div>
					</div>
				</div>
				<input type="hidden" id="data" name="data">
				<div class="panel-footer">
					<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Добавить маршрут">
					<div id="print">Вывести</div>					
				</div>
			</form>
		</div>
@endsection
@push('head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.pm@latest/dist/leaflet.pm.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.css" />
@endpush
@push('bottom')
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.js"></script>
<script src="https://unpkg.com/leaflet.pm@latest/dist/leaflet.pm.min.js"></script>
<script src="http://trackingroutes/js/ir.js"></script>
<script>
	function modalShow(obj = {}) {
		$('#obj-name').val(obj.name || '');
		$('#obj-desc').val(obj.desc || '');
		$('#exampleModal').modal({ backdrop: 'static', keyboard: false });
	}

	function dbclickMarker(evt) {
		point = evt.target;
		modalShow({
			name: point.properties.name,
			desc: point.properties.desc,
		});
	}

	let point = undefined;
	let map = getEditableMap();
	let route = L.polyline([[57.14071029202315, 65.17089843750001], [57.125804948722575, 65.99487304687501]], {
		color: '#F00',
	}).addTo(map);

	route.pm.enable({ draggable: false });
	route.pm.toggleEdit();
	route.properties = { color: $('#color').val() };
	map.fitBounds(route.getBounds());

	map.on('pm:create', function(evt) {
		if(evt.shape == 'Marker') {
			point = evt.layer;
			point.properties = { isset: false };
			point.on('dblclick ', dbclickMarker);
			modalShow();
		}
	});

	$('#save-obj').on('click', function(evt) {
		point.properties.name = $('#obj-name').val();
		point.properties.desc = $('#obj-desc').val();
		point.properties.isset = true;
	});

	$('#cancel-obj').on('click', function(evt) {
		if(!point.properties.isset){
			map.removeLayer(point);
		}
	});

	$('#color').on('change', function() {
		let color = $('#color').val();
		route.setStyle({ color: color });
		route.properties.color = color;
    }); 

	$('#submit').on('click', function(evt) {
		map.pm.disableDraw();
		map.pm.disableGlobalEditMode();

		let geoRoute = route.toGeoJSON();
		geoRoute.properties = route.properties;
		let join = { route: geoRoute, points: [] }
		map.eachLayer(function(layer) {
			if(layer instanceof L.Point || layer instanceof L.Marker) {
				let geo = layer.toGeoJSON();
				geo.properties = layer.properties;
				join.points.push(geo);
			}
		});
		$('#data').val(JSON.stringify(join));
	});
</script>
@endpush