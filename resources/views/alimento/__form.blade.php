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
            <label for="peso_padrao" class="control-label">Peso Padrão:</label> 
            <input type="number" inputmode="decimal"
                        step="0.1" 
                   name="peso_padrao" 
                   id="peso_padrao"
                   value="{{ isset( $registro->peso_padrao ) ? $registro->peso_padrao : '' }}" 
                   class="form-control @error('peso_padrao') is-invalid @enderror "/>
                   @error('peso_padrao')
                   <div class="invalid-feedback">
                <span ><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group">
            <label for="carbo" class="control-label">Carboidrato:</label>
                <input type="number" inputmode="decimal"
                step="0.1" 
                name="carbo" 
                id="carbo"
                value="{{ isset( $registro->carbo ) ? $registro->carbo : '' }}" 
                class="form-control @error('carbo') is-invalid @enderror "/>
                @error('carbo')
                <div class="invalid-feedback">
             <span ><strong>{{ $message }}</strong></span>
         </div>
         @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="proteina" class="control-label">Proteina:</label>
            <input type="number" inputmode="decimal"
            step="0.1"
             name="proteina" id="proteina"
             value="{{ isset($registro->proteina )? $registro->proteina : '' }}"
             class="form-control @error('proteina') is-invalid @enderror" />
             @error('proteina')
             <div class="invalid-feedback">
                 <span><strong>{{ $message }}</span></strong>
              </div>
             @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="gordura" class="control-label">Gordura:</label>
            <input type="number" inputmode="decimal" 
            step="0.1"
            name="gordura" id="gordura"
                value="{{ isset($registro->gordura )? $registro->gordura : '' }}"
                class="form-control @error('gordura') is-invalid @enderror" />
                    @error('gordura')
                    <div class="invalid-feedback">
                        <span><strong>{{ $message }}</span></strong>
                     </div>
                    @enderror
        </div>
    </div>
</div>


