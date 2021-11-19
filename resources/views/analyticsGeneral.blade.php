@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <analytics-general
            actions="{{ $actions }}"
        />
    </div>
@endsection
