@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <analytics-month
            actions="{{ $actions }}"
        />
    </div>
@endsection
