@extends('main')
@section('title', trans('globals.create_restaurant'))

@section('content')
    @include('components.messages.message')

    <form action="{{ route('restaurant.store') }}" method="POST" id="restaurant-create-form">
        @csrf
        @include('restaurant.form')
        <button type="submit" class="btn btn-primary">{{ trans('globals.create') }}</button>
    </form>
@endsection
