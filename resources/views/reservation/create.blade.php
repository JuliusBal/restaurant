@extends('main')
@section('title', trans('globals.create_reservation'))

@section('content')
    @include('components.messages.message')

    <form action="{{ route('reservation.store') }}" method="POST" id="restaurant-create-form">
        @csrf
        @include('reservation.form')
        <button type="submit" class="btn btn-primary">{{ trans('globals.create') }}</button>
    </form>
@endsection
