<form action="{{ url('search-product') }}" method="POST">
    @csrf
    <div class="input-group ">
        <input type="search" id="search" name="search_name" required class="form-control"
            placeholder="@lang('app.search')">
        <button type="submit" class="input-group-text btn btn-warning"><i class="fa fa-search"></i></button>
    </div>
</form>
