<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" name="nome" id="nome" 
            value="{{ isset($registro->nome )? $registro->nome : '' }}"
            class="form-control @error('nome') is-invalid @enderror" />
            @error('nome')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</span></strong>
             </div>
            @enderror

        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group">
            <label for="peso" class="control-label">Peso:</label> 
            <input type="number" inputmode="decimal"
                        step="0.1" 
                   name="peso" 
                   id="peso"
                   value="{{ isset( $registro->peso ) ? $registro->peso : '' }}" 
                   class="form-control @error('peso') is-invalid @enderror "/>
                   @error('peso')
                   <div class="invalid-feedback">
                <span ><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
</div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group">
            <label for="usuario_id" class="control-label">Usuario:</label>
            <select type="text" name="usuario_id" id="usuario_id"  class="form-control @error('usuario_id') is-invalid @enderror" /> ">
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id}}">{{$usuario->nome}}</option> 
                    @endforeach
            </select>
            @error('usuario_id')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</span></strong>
             </div>
            @enderror
        </div>
</div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="form-group">
                <label for="alimento_id" class="control-label">Alimento:</label>
                <select type="text" name="alimento_id" id="alimento_id" class="form-control ">
                        @foreach ($alimentos as $alimento)
                            <option value="{{ $alimento->id}}">{{$alimento->nome}}</option> 
                        @endforeach
                </select>
                @error('alimento_id')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</span></strong>
             </div>
            @enderror
            </div>
    </div>
    </div>



