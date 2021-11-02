@extends('layouts.app')
@section('content')

    @pagina_componente(['colunas' => '8', 'fluid' => true])
        @cartaocrude_componente
            @slot('titulo')
                @titulo_componente(['titulo' => $titulo])
                @endtitulo_componente
            @endslot
            @slot('conteudo')
                @alerta_componente
                @endalerta_componente
                @breadcrumb_componente(["lista" => $breadcrumb])
                @endbreadcrumb_componente
                <form action="{{ route($nomeRota.'.salvar') }}" method="post" class="">
                    @csrf
                    @include('admin.'.$nomeRota.'.formulario')
                    <button>Criar</button>
                </form>
            @endslot
        @endcartaocrude_componente
    @endpagina_componente

@endsection
