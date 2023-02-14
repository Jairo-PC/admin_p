@extends('layouts.app')

@section('template_title')
    {{ $contacto->name ?? 'Show Contacto' }}
@endsection
<center>
@section('content')

    <section class="content container-fluid">
        <div class="container-fluid">
            <div class="row">  
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                <div class="card-header">
                        <span class="card-title">Ver registro</span>
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $contacto->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>descripcion:</strong>
                            {!!$contacto->descripcion!!}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $contacto->url }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            <img src="{{asset('storage').'/'.$contacto->imagen}}" width="100px" alt=""></td>
                            
                        </div>

                            <div class="float-right">
                                <br>
                                <a class="btn btn-success" href="{{ route('contactos.index') }}"> Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection 
</center>


