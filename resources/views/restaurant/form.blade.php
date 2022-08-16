<div class="form-group">
    <div>
        <label>{{ trans('globals.name') }}</label>
    </div>

    <input type="text" name="name" id="restaurantName" value="{{ old('name') }}" required/>
</div>
<br/>

<div class="form-group">
    <div>
        <label>{{ trans('globals.tables') }}</label>
    </div>

    <input type="number" name="tables" id="restaurantTables" value="{{ old('tables') }}" required/>
</div>
<br/>

<div class="form-group">
    <div>
        <label>{{ trans('globals.guest_capacity') }}</label>
    </div>

    <input type="number" name="guest_capacity" id="restaurantGuests" value="{{ old('guest_capacity') }}" required/>
</div>
<br/>
