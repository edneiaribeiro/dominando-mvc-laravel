<input type="text" name="name" value="{{ old('name') ?? $registro->name ?? '' }}">
@if ($errors->has('name'))
    {{ $errors->first('name') }}
@endif

<input type="email" name="email" value="{{ old('email') ?? $registro->email ?? '' }}">
@if ($errors->has('email'))
    {{ $errors->first('email') }}
@endif

<input type="password" name="password">
@if ($errors->has('password'))
    {{ $errors->first('password') }}
@endif

<input type="password" name="password_confirmation">
