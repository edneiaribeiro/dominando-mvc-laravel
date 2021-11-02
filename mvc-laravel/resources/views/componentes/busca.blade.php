<form action="{{ $action }}" method="GET">
    <div class="col-auto">
      <div class="input-group mb-2">
        <input type="text" class="form-control" name="busca" value="{{ $busca }}" placeholder="Buscar">
        <div class="input-group-prepend">
          <button name="button" class="btn btn-success"><ion-icon name="search-outline"></ion-icon></button>
        </div>
      </div>
    </div>
</form>