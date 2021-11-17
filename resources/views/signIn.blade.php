@extends('layouts.withoutNavbar')

@section('content')
    <div id="app">
        <sign-in
            :all_places="{{ $allPlaces }}"
        />
    </div>
@endsection
