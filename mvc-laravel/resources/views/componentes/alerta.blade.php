@if (session('status'))
<div class="alert alert-{{ session('status') }}" role="alert">
    {{ session('msg') }}
</div>
@endif