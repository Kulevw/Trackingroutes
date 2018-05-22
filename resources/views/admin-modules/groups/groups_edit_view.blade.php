@extends('crudbooster::admin_template')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Изменение группы
    </div>
    <form id="mainform" method="post" action="{{ CRUDBooster::mainpath('edit-save/'.$row->id) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="panelBody" class="panel-body">
            <div class="form-group">
                <label for="guide_id">Гид</label>
                <select id="guide_id" name="guide_id" class="form-control" required>
                    <option value="" selected disabled hidden>Выберите гида</option>
                    @foreach($guides as $item)
                        <option value="{{$item->id}}" {{$item->id == $row->guide_id ? "selected" : ""}}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="route_id">Маршрут</label>
                <select id="route_id" name="route_id" class="form-control" required>
                    <option value="" selected disabled hidden>Выберите маршрут</option>                                 
                    @foreach($routes as $item)
                        <option value="{{$item->id}}" {{$item->id == $row->route_id ? "selected" : ""}}>{{$item->fullname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="start_plan">Начало</label>
                <input type="datetime-local" name="start_plan" value="{{str_replace(' ', 'T', $row->start_plan)}}" id="start_plan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="start_fact">Фактическое начало</label>
                <input type="datetime-local" name="start_fact" value="{{str_replace(' ', 'T', $row->start_fact)}}" id="start_fact" class="form-control">
            </div>
            <div class="form-group">
                <label for="end">Окончание</label>
                <input type="datetime-local" name="end" value="{{str_replace(' ', 'T', $row->end)}}" id="end" class="form-control">
            </div>
        </div>
        <input type="hidden" id="data" name="data">
        <div class="panel-footer">
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Изменить">
            <a href="{{CRUDBooster::mainpath()}}" class="btn btn-primary">Отмена</a>	
        </div>
    </form>
</div>
@endsection
@push('head')

@endpush
@push('bottom')

@endpush