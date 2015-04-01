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

    {!! Form::open(['route' => ['admin.users.destroy',':USER_ID'], 'method'=> 'delete', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.btn-eliminar').click(function(e){

            e.preventDefault();

            var row=$(this).parents('tr');
            var id=row.data('id');
            var form=$('#form-delete');
            var url=form.attr('action').replace(':USER_ID', id);
            var data=form.serialize();

            row.fadeOut();

            $.post(url, data, function(result){
                alert(result.message);
            }).fail(function(){
                alert('El usuario no fue eliminado');
                row.show();
            });

        });
    })
</script>
@endsection