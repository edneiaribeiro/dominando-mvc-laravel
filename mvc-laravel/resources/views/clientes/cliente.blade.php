@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    View da pasta clientes

                    @foreach ($lista as $key => $cliente)
                        <li>{{ $cliente->nome }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
