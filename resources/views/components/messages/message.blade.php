@if($errors->any())
    <div style="text-align:center">
        <ul>
            @foreach ($errors->all() as $error)
                <li><b>{{ $error }}</b></li>
            @endforeach
        </ul>
    </div>
@endif

@if (\Session::has('success'))
    <div style="text-align:center">
        <ul>
            <li><b>{!!\Session::get('success') !!}</b></li>
        </ul>
    </div>
@endif
