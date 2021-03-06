@include('layouts.validacao')

<div class="row">
    <div class="col-sm-4">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div id="drop-zone">
                        <div id="fotoBanco">
                            <input type="hidden" id="profile_pic" name="profile_pic"/>
                            <img id="imageUpload" src="{{ isset($registro->profile_pic) ? 
                                                  url('/imagem', $registro->profile_pic) :
                                                  url('/imagem', 'boy.png') }}" class="avatar" />
                        </div>
                        <div id="clickHereLeft" style="float:left;">
                            <div style="text-align: center;">
                                <label for="fileInput"><i class="fa fa-upload fa-lg" ></i></label>
                            </div>
                            <input type="file" accept=".jpg,.jpeg,.png" id="fileInput"
                                class="form-control hide btn-responsive">
        
                        </div>
                        <div id="clickHereRight" style="float:right;">
                            <div style="text-align: center;">
                                <label for="fileExcluir"><i class="fa fa-trash fa-lg"></i></label>
                            </div>
                            <input type="button" id="fileExcluir" class="form-control hide btn-responsive">
     
                        </div>
                    </div>
                </div>     
            </div>    
        </div>        
   </div>
    <div class="col-sm-8">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nome" class="control-label">Nome:</label>
                    <input type="text" name="nome" id="nome"
                        value="{{ isset($registro->nome) ? $registro->nome : '' }}"
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
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="data_nascimento" class="control-label">Data Nascimento:</label>
                    <input type="text" name="data_nascimento" id="data_nascimento"
                        value="{{ isset($registro->data_nascimento) ? date('d/m/Y', strtotime($registro->data_nascimento)) : '' }}"
                        class="form-control @error('data_nascimento') is-invalid @enderror " />
                    @error('data_nascimento')
                        <div class="invalid-feedback">
                            <span><strong>{{ $message }}</strong></span>
                        </div>
                    @enderror
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="sexo" class="control-label">SEXO:</label>
                    <select type="text" name="sexo" id="sexo" class="form-control @error('sexo') is-invalid @enderror ">
                        @if (isset($registro->sexo))
                            <option value="">Selecione o Sexo</option>
                            <option value="F" {{ $registro->sexo === 'F' ? 'selected' : '' }}>Feminino</option>
                            <option value="M" {{ $registro->sexo === 'M' ? 'selected' : '' }}>Masculino</option>
                        @else
                            <option value="">Selecione o Sexo</option>
                            <option value="F">Feminino</option>
                            <option value="M">Masculino</option>
                        @endif
                    </select>
                    @error('sexo')
                        <div class="invalid-feedback">
                            <span><strong>{{ $message }}</strong></span>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="email" class="control-label">E-mail:</label>
                    <input type="text" name="email" id="email"
                        value="{{ isset($registro->email) ? $registro->email : '' }}"
                        class="form-control @error('email') is-invalid @enderror" />
                    @error('email')
                        <div class="invalid-feedback">
                            <span><strong>{{ $message }}</span></strong>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="telefone_celular" class="control-label">Celular:</label>
                    <input type="text" name="telefone_celular" id="telefone_celular"
                        value="{{ isset($registro->telefone_celular) ? $registro->telefone_celular : '' }}"
                        class="form-control @error('telefone_celular') is-invalid @enderror" />
                    @error('telefone_celular')
                        <div class="invalid-feedback">
                            <span><strong>{{ $message }}</span></strong>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="senha" class="control-label">Senha:</label>
                    <input type="password" name="senha" id="senha"
                        class="form-control @error('senha') is-invalid @enderror" />
                    @error('senha')
                        <div class="invalid-feedback">
                            <span><strong>{{ $message }}</span></strong>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="confirmar_senha" class="control-label">Confirmar a Senha:</label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha"
                        class="form-control @error('confirmar_senha') is-invalid @enderror" />
                    @error('confirmar_senha')
                        <div class="invalid-feedback">
                            <span><strong>{{ $message }}</span></strong>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" id="id" value="{{ isset( $registro->id ) ? $registro->id : ''  }}"/>
</div>

@section('javascript')

  <script>
        $("#fileInput").change(function(e){
           e.preventDefault();
           enviarFoto(this);
        });
        $("#fileExcluir").click(function(e){
           e.preventDefault();
           excluirFoto(this);
        });
          //preparar um pacote
        function enviarFoto(input){
          if (input.files && input.files[0]){
              var reader = new FileReader();
              var filename = $('#fileInput').val();
              filename = filename.substring(filename.lastIndexOf('\\')+1);
              reader.onload = function(e){
                  $('#imageUpload').attr('src', e.target.result);
                  $('#imageUpload').hide();
                  $('#imageUpload').fadeIn(500);
              }
              reader.readAsDataURL(input.files[0])
              sendToServer(input.files[0])
          }
     
        }
        function sendToServer(foto){
            var formData = new FormData();
            formData.append('image',foto);
            formData.append('fotoAntiga',$('#profile_pic').val());
            formData.append('id',$('#id').val());
            $('#fileInput').val('');
            $.ajax({
                url: "{{ url('/store') }}",
                method: 'POST',
                data:formData,
                dataType:'JSON',
                cache:false, 
                contentType:false,
                processData: false,
                beforeSend: function(xhr, type) {
                    if (!type.crossDomain) {
                        xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                    }
                },
                success : function(response){
                    console.log(response.nomeArquivo);
                    $('#profile_pic').val(response.nomeArquivo);
                },
                error:function(data){
                    console.log("erro de upload "+data)
                }
            })   
            
        }
        function excluirFoto(e){
            console.log($('#profile_pic').val());
            var formData = new FormData();
            formData.append('image',$('#imageUpload').val());
            formData.append('id',$('#id').val());
            $.ajax({
                url: "{{ url('/imagem/excluir') }}",
                type:"POST",
                data:formData,
                dataType:'JSON',
                cache:false, 
                contentType:false,
                processData: false,
                beforeSend: function(xhr, type) {
                    if (!type.crossDomain) {
                        xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                    }
                },
                success: function(response){
                    $('#profile_pic').val('');
                    document.getElementById('imageUpload').src = "{{ url('/imagem', 'boy.png') }}";
                    $('#profile_pic').val(response.nomeArquivo);
                    $('#fileInput').val('');
                },
                error:function(response){
                    document.getElementById('imageUpload').src = "{{ url('/imagem', 'boy.png') }}";
                    $('#profile_pic').val(response.nomeArquivo);
                    $('#fileInput').val('');
               }
            })
        }
  
  </script> 
    
@endsection
