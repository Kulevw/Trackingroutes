@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card rounded-0">
        <div class="card-header"> Мои маршруты </div>
        <div class="card-body">
            <div class="card-block">
                <table class="table">
                    <thead>
                        <td>Маршрут</td>
                        <td>Дата</td>
                    </thead>
                    @foreach($my_routes as $item)
                        <tr class="{{$item->end ? 'table-success' : ''}}" >
                            <td>{{$item->route_name}}</td>
                            <td>{{$item->start_plan}}</td>                            
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
