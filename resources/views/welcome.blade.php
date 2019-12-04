@extends('layouts.client.master')

@section('content')

    <div class="container">
    <slider-compo></slider-compo>

        <div class="row mx-0 bg-white pt-3 pb-5 px-3">
            <div class="col-12 col-md-3 pr-0 mb-4">
                <important-news></important-news>
            </div>
            <div class="col-12 col-md-9 pl-0">
                <lastnews></lastnews>
            </div>
        </div>

    </div>

@endsection
