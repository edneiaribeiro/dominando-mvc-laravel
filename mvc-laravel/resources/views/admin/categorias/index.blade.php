@extends('layouts.app')

@section('content')
    @pagina_componente(['colunas' => '12', 'fluid' => true])
        <div class="card">
                @titulo_componente(['titulo' => 'Categorias'])
                    
                @endtitulo_componente

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-{{ session('status') }}" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif

                    <a class="btn btn-success" href="{{ route('categoria.criar') }}"> Criar</a>
                    <br><br>
                   
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($lista as $key => $value)
                              <tr>
                                <th scope="row">{{ $value->id }}</th>
                                <td>{{ $value->nome }}</td>
                                <td>
                                    
                                    <form action="{{ route('categoria.deletar', $value->id) }}" method="post" class="">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-info" href="{{ route('categoria.editar', $value->id) }}"> Editar</a>
                                        <a class="btn btn-warning" href="{{ route('categoria.visualizar', $value->id) }}"> Visualizar</a>
                                        <button class="btn btn-danger">Deletar</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>

                      {{ $lista }}

                </div>
        </div>
    @endpagina_componente
@endsection
