@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('admin.users.partials.pituito')
                <div class="panel panel-default">
                    <div class="panel-heading">Nuevo Usuario</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'admin.users.store', 'method'=> 'POST']) !!}
                        @include('admin.users.partials.field')
                        <button type="submit" class="btn btn-default">Crear Usuario</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
