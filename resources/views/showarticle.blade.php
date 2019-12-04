@extends('layouts.client.master')

@section('content')

    <div class="container">
        <div class="row mx-0 bg-white pt-3 pb-5 px-3">
            <div class="col-12 order-1 order-md-0 col-md-3 pr-0 mb-4">
                <important-news></important-news>
            </div>
            <div class="col-12 order-0 order-md-1 col-md-9 pl-0">
                <showarticle :article="{{$article}}"></showarticle>
            </div>
        </div>

    </div>

@endsection
