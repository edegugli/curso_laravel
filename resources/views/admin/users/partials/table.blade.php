<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acciones</th>
    </tr>
    @foreach($users as $user)
        <tr data-id="{{ $user->id }}">
            <td>{{ $user->id }}</td>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a class="btn btn-default" href="{{ route('admin.users.edit',$user->id) }}">Editar</a>
                <a class="btn btn-danger btn-eliminar" href="#!">Eliminar</a>
            </td>
        </tr>
    @endforeach
</table>