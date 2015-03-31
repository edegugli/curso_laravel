@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('admin.users.partials.pituito')
                <div class="panel panel-default">
                    <div class="panel-heading">Edición del usuario {{ $user->full_name }}</div>

                    <div class="panel-body">
                        {!! Form::model($user, ['route' => ['admin.users.update',$user->id], 'method'=> 'PUT']) !!}
                        @include('admin.users.partials.field')
                        <button type="submit" class="btn btn-default" >Editar Usuario</button>
                        {!! Form::close() !!}


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
