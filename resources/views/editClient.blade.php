@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <edit-client
            client="{{ $client }}"
        />
    </div>
@endsection
