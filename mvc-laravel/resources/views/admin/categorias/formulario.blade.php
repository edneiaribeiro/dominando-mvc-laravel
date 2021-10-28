<input type="text" name="nome" value="{{ old('nome') ?? $registro->nome ?? '' }}">

@if ($errors->has('nome'))
{{ $errors->first('nome') }}
@endif