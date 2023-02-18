
<div class="box box-info padding-1">
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $contacto->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{-- {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $contacto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!} --}}
            
                
                    <label for="">Descripcion</label>
                    <textarea name="descripcion" id="" cols="30" rows="5" class="form-control" required>{{$contacto->descripcion}}</textarea>
                    @error('descripcion')
                        <small style="...">{{$message}}</small>
                    @enderror
                    <script>
                        CKEDITOR.replace('descripcion');
                    </script>
                
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('url') }}
            {{ Form::text('url', $contacto->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'url']) }}
            {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">

            {{-- {{ Form::label('imagen') }}
            {{ Form::text('imagen', $contacto->imagen, ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!} --}}

            <div class="form-group">
                <label for="">Imagen</label>
                    <input type="file" name="imagen" id="file" class="form-control" value="{{old('imagen')}}" required>
                    @error('imagen')
                        <small style="...">{{$message}}</small>
                    @enderror
                    <br>
                    <center><output id="list" style="..."></output></center>
                    <script>
                        function archivo (evt){
                            var files = evt.target.files;
                            for(var i = 0, f; f = files[i]; i++){
                                if(!f.type.match('image.*')){
                                    continue;
                                }
                                var reader = new FileReader();
                                reader.onload = (function (theFile)) {
                                    return function (e){
                                        document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src>']
                                    };
                                }}(f);
                                reader.readAsDataURL(f);
                            }
                        
                        document.getElementById('file').addEventListener('change', archivo, false);
                    </script>
            </div>
        </div>

        
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="{{ route('contactos.index') }}" class="btn btn-success">Cancelar</a>
    </div>
    
</div>