@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>

                    @if(Session::has('message'))
                        <br>
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif

                    <div class="panel-body">
                        <a class="btn btn-info" href="{{ route('admin.users.create') }}">Crear Usuario</a>
                        <p> Hay {{ $users->total() }} usuarios</p>
                        @include('admin.users.partials.table')
                        {!! $users->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
