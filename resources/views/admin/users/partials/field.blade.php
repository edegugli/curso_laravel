<div class="form-group">
    {!! Form::label('email','Correo electrónico') !!}
    {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'Por favor ingrese su e-mail']) !!}
</div>
<div class="form-group">
    {!! Form::label('first_name','Nombre') !!}
    {!! Form::text('first_name', null, ['class'=>'form-control','placeholder'=>'Por favor ingrese su nombre']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name','Apellido') !!}
    {!! Form::text('last_name', null, ['class'=>'form-control','placeholder'=>'Por favor ingrese su apellido']) !!}
</div>
<div class="form-group">
    {!! Form::label('password','Contraseña') !!}
    {!! Form::password('password', ['class'=>'form-control','placeholder'=>'Por favor ingrese su contraseña']) !!}
</div>
<div class="form-group">
    {!! Form::label('type','Tipo de usuario') !!}
    {!! Form::select('type', [''=>'Seleccione tipo de usuario','user'=>'Usuario','admin'=>'Administrador'], NULL, ['class'=>'form-control']) !!}
</div>
