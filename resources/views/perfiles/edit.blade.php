@extends('layouts.app')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"
          integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg=="
          crossorigin="anonymous" />

@endsection

@section('buttons')
    <a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 icono" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
          </svg>
        volver
    </a>
@endsection

@section('content')

    {{$perfil->perfilToUser->name}}
    <h2 class="text-center mb-5">Editar mi Perfil</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
        <form action="{{ route('perfiles.update', ['perfil' => $perfil->id] )}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre</label>

                    <input type="text" name="nombre" id="nombre" value="{{ $perfil->perfilToUser->name }}"
                        class="form-control @error('nombre') is-invalid  @enderror"
                        placeholder="Tu Nombre" />

                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="url">Sitio web</label>

                    <input type="text" name="url" id="url"  value="{{ $perfil->perfilToUser->url }}"
                        class="form-control @error('url') is-invalid  @enderror"
                        placeholder="Tu sitio web" />

                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group mt-3">
                    <label for="biografia">Biografia</label>

                    <input type="hidden" name="biografia" id="biografia" value="{{ $perfil->biografia }}"  />
                    <trix-editor input="biografia" style="height: 300px"
                                 class="form-control @error('biografia') is-invalid  @enderror"
                                ></trix-editor>

                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="imagen">Imagen</label>

                    <input type="file"
                           class="form-control @error('imagen') is-invalid  @enderror"
                           name="imagen" id="imagen" value=""  />

                    @if( $perfil->imagen )
                        <div class="mt-4">
                            <p>Imagen Actual: </p>
                        <img src="/storage/{{ $perfil->imagen }}" style="width: 300px;" />
                        </div>
                    @endif

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="actualizar perfil" />
                </div>

            </form>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"
            integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ=="
            crossorigin="anonymous" defer>
    </script>

@endsection
