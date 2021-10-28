@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-{{ session('status') }}" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif

                    <form action="{{ route('categoria.salvar') }}" method="post" class="">
                        @csrf
                        @include('admin.categorias.formulario')
                        <button>Criar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
