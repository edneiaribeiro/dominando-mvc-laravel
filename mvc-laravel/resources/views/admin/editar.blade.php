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

                    View Editar id =  {{ $id }}

                    <form action="" method="post" class="">
                        @csrf
                        @method('PUT')
                        <input type="text" name="nome" value="">
                        <button>Atualizar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
