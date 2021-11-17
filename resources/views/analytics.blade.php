@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <analytics
            actions="{{ $actions }}"
        />
    </div>
@endsection
