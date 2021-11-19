@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <analytics-goods
            actions="{{ $actions }}"
        />
    </div>
@endsection
