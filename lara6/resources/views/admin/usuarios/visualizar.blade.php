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
                <h2>{{ $titulo }}:</h2>

                <p>Nome: {{ $registro->name }}</p>
                <p>E-mail: {{ $registro->email }}</p>
            @endslot
        @endcartaocrude_componente
    @endpagina_componente

@endsection
