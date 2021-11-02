<div class="container{{ isset($fluid) && $fluid ? '-fluid' : '' }}">
    <div class="row justify-content-center">
        <div class="col-md-{{ $colunas ?? "12" }}">
            {{ $slot }}
        </div>
    </div>
</div>        