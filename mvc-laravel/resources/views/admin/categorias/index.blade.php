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

            <div class="row">
              <div class="col-6">
                @criar_componente( ['rota' => $nomeRota] )
                @endcriar_componente
              </div>
              <div class="col-6">
                @busca_componente([
                  'action' => route($nomeRota.'.index'),
                  'busca' => $busca ?? ''
                  ])
                @endbusca_componente
              </div>
            </div>

            @tabela_componente
              @slot('titulos')
                <th scope="col">#</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ação</th>
              @endslot

              @slot('registros')
                @foreach ($lista as $key => $value)
                  <tr>
                    <th scope="row">{{ $value->id }}</th>
                    <td>{{ $value->nome }}</td>
                    <td>
                        
                        <form action="{{ route($nomeRota.'.deletar', $value->id) }}" method="post" class="">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info" href="{{ route($nomeRota.'.editar', $value->id) }}"> Editar</a>
                            <a class="btn btn-warning" href="{{ route($nomeRota.'.visualizar', $value->id) }}"> Visualizar</a>
                            <button class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
              @endslot
              @endtabela_componente

              @paginacao_componente(['lista' => $lista])
              @endpaginacao_componente
            @endslot
      @endcartaocrude_componente
    @endpagina_componente
@endsection
