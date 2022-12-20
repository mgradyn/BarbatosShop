<form action="{{ route($name) }}">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Product" name="search"
            value={{ request('search') }}>
        <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
    </div>
</form>
