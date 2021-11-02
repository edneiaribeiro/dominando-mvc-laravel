@extends('layouts.app')
@section('content')

    @pagina_componente(['colunas' => '12', 'fluid' => true])
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
                    <form action="{{ route($nomeRota.'.atualizar', $registro->id) }}" method="post" class="">
                        @csrf
                        @method('PUT')
                        @include('admin.'.$nomeRota.'.formulario')
                        @button_componente([
                            'classe' => 'btn-primary',
                            'nome' => 'Atualizar'
                        ])
                        @endbutton_componente
                    </form>
            @endslot
        @endcartaocrude_componente
    @endpagina_componente
@endsection
