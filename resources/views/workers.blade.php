@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <workers
            workers="{{ $workers }}"
        />
    </div>
@endsection
