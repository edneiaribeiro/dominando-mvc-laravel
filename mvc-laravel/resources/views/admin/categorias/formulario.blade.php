<div class="form-row">
    <div class="form-group col-md-12">
        @php
            $label = 'Nome';
            $placeholder = 'Digite o '.$label;
            $name = 'nome';
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
</div>
