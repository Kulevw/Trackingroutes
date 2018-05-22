@extends('crudbooster::admin_template')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Мои группы</div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Маршрут</td>
                <td>Начало</td>
                <td>Фактическое начало</td>
                <td>Окончание</td>
                <td>Действие</td>
            </tr>
        </thead>
        <tbody>
            @foreach($result as $row)
                <tr class="">
                    <td>{{$row->route}}</td>
                    <td>{{$row->start_plan}}</td>
                    <td>{{$row->start_fact}}</td>
                    <td>{{$row->end}}</td>
                    <td>
                        @if(CRUDBooster::isUpdate() && $button_edit)
                            <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("edit/$row->id")}}'>Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('head')

@endpush
@push('bottom')

@endpush