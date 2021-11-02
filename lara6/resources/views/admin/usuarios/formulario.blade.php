<div class="form-row">
    <div class="form-group col-md-6">
        @php
            $label = 'Nome';
            $placeholder = 'Digite seu '.$label;
            $name = 'name';
            $type = 'text';
            $valid = 'Looks good!';
        @endphp
        <label for="{{ $name }}">{{ $label }}</label>
        <input type="{{ $type }}" name="{{$name}}" id="{{$name}}" class="form-control {{ $errors->has($name) ? 'is-invalid' : (old($name) ? 'is-valid' : '') }}" placeholder="{{ $placeholder }}" value="{{ old($name) ?? $registro->{$name} ?? '' }}">
        @if ($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}    
            </div>
        @elseif (old($name))
            <div class="valid-feedback">
                {{ $valid }}
            </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        @php
            $label = 'E-mail';
            $placeholder = 'Digite seu '.$label;
            $name = 'email';
            $type = 'email';
            $valid = 'Looks good!';
        @endphp
        <label for="{{ $name }}">{{ $label }}</label>
        <input type="{{ $type }}" name="{{$name}}" id="{{$name}}" class="form-control {{ $errors->has($name) ? 'is-invalid' : (old($name) ? 'is-valid' : '') }}" placeholder="{{ $placeholder }}" value="{{ old($name) ?? $registro->{$name} ?? '' }}">
        @if ($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}    
            </div>
        @elseif (old($name))
            <div class="valid-feedback">
                {{ $valid }}
            </div>
        @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        @php
            $label = 'Password';
            $placeholder = 'Digite seu '.$label;
            $name = 'password';
            $type = 'password';
            $valid = 'Looks good!';
        @endphp
        <label for="{{ $name }}">{{ $label }}</label>
        <input type="{{ $type }}" name="{{$name}}" id="{{$name}}" class="form-control {{ $errors->has($name) ? 'is-invalid' : (old($name) ? 'is-valid' : '') }}" placeholder="{{ $placeholder }}">
        @if ($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}    
            </div>
        @elseif (old($name))
            <div class="valid-feedback">
                {{ $valid }}
            </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        @php
            $label = 'Confirme seu Password';
            $placeholder = 'Repita o '.$label;
            $name = 'password_confirmation';
            $type = 'password';
            $valid = 'Looks good!';
        @endphp
        <label for="{{ $name }}">{{ $label }}</label>
        <input type="{{ $type }}" name="{{$name}}" id="{{$name}}" class="form-control {{ $errors->has($name) ? 'is-invalid' : (old($name) ? 'is-valid' : '') }}" placeholder="{{ $placeholder }}" value="{{ old($name) ?? $registro->{$name} ?? '' }}">
        @if ($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}    
            </div>
        @elseif (old($name))
            <div class="valid-feedback">
                {{ $valid }}
            </div>
        @endif
    </div>
</div>
