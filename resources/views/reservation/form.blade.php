<div class="form-group">
    <div><label for="cars">{{ trans('globals.choose_restaurant') }}:</label></div>

    <select name="restaurant_id" id="reservationRestaurant">
        <option selected>{{ trans('globals.please_choose') }}</option>
        @foreach($restaurants as $restaurant)
            <option
                value="{{ $restaurant->id }}" {{ ( old('restaurant_id') == $restaurant->id ? "selected":"") }}>{{ $restaurant->name }}</option>
        @endforeach
    </select>
</div>
<br/>

<div class="form-group">
    <div>
        <label>{{ trans('globals.your_details') }}:</label>
    </div>

    <input type="text" name="guest_first_name" id="reservationGuestFirstName"
           placeholder="{{ trans('globals.placeholder.first_name') }}" value="{{ old('guest_first_name') }}" required/>
    <input type="text" name="guest_last_name" id="reservationGuestLastName"
           placeholder="{{ trans('globals.placeholder.last_name') }}" value="{{ old('guest_last_name') }}" required/>
    <input type="email" name="guest_email" id="reservationGuestEmail"
           placeholder="{{ trans('globals.placeholder.email') }}" value="{{ old('guest_email') }}" required/>
    <input type="text" name="guest_phone_number" id="reservationGuestPhoneNumber"
           placeholder="{{ trans('globals.placeholder.phone') }}" value="{{ old('guest_phone_number') }}" required/>
</div>
<br/>

<div>
    <label>{{ trans('globals.guest_list') }}:</label>
</div>

<input type="text" id="guestInput" placeholder="{{ trans('globals.placeholder.add_guest') }}" style="min-width:30%">
<button onclick="newElement()" type="button">{{ trans('globals.add') }}</button>

<div id="guests"></div>
<br/>

<div class="form-group">
    <div>
        <div>
            <label>{{ trans('globals.reservation_date') }}:</label>
        </div>

        <input type="datetime-local" name="reservation_date" value="{{ old('reservation_date', date('d/m/Y, h:m')) }}">
    </div>
</div>
<br/>

<div class="form-group">
    <div><label>{{ trans('globals.reserve_for') }}:</label></div>
    <select name="reserved_for" id="reservationReservedFor">
        <option selected>{{ trans('globals.please_choose') }}</option>
        @for ($i = 1; $i < 4; $i++)
            <option value="{{ $i }}" {{ ( old('reserved_for') == $i ? "selected":"") }}>{{ $i .' Hours' }}</option>
        @endfor
    </select>
</div>
<br/>
