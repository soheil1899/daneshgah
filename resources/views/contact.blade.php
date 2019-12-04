@extends('layouts.client.master')

@section('content')

    <div class="container">
        <div class="row mx-0 bg-white pt-3 pb-5 px-3">
            <div class="col-12 order-1 order-md-0 col-md-3 pr-0 mb-4">
                <important-news></important-news>
            </div>
            <div class="col-12 order-0 order-md-1 col-md-9 pl-0 py-4 px-5 text-right">

                <h4 class="font-weight-bolder font18">
                    راه های ارتباطی ما
                </h4>
                <div class="undertitle mb-5"></div>


                <div class="d-block">
                    <label class="ml-3">شماره تماس:</label>
                    <label class="font-weight-bolder">{{$setting['tellphone']}}</label>
                </div>
                <div class="d-block">
                    <label class="ml-3">شماره موبایل:</label>
                    <label class="font-weight-bolder">{{$setting['mobile']}}</label>
                </div>
                <div class="d-block">
                    <label class="ml-3">شماره فکس:</label>
                    <label class="font-weight-bolder">{{$setting['fax']}}</label>
                </div>
                <div class="d-block">
                    <label class="ml-3">آدرس ایمیل:</label>
                    <label class="font-weight-bolder">{{$setting['email']}}</label>
                </div>
                <div class="d-block">
                    <label class="ml-3">آدرس:</label>
                    <label class="font-weight-bolder">{{$setting['address']}}</label>
                </div>
                <div class="d-block mt-4">
                    <div class="px-2 my-2 d-inline-block pt-2 pb-1 widthfit pointer">
                        <a href="{{$setting['instagram']}}" class="text-dark">
                            <i class="fab fa-instagram fa-2x"></i>
                        </a>
                    </div>
                    <div class="px-2 my-2 d-inline-block pt-2 pb-1 widthfit pointer">
                        <a href="{{$setting['telegram']}}" class="text-dark">
                            <i class="fab fa-telegram-plane fa-2x"></i>
                        </a>
                    </div>
                    <div class="px-2 my-2 d-inline-block pt-2 pb-1 widthfit pointer">
                        <a href="{{$setting['twitter']}}" class="text-dark">
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                    </div>
                    <div class="px-2 my-2 d-inline-block pt-2 pb-1 widthfit pointer">
                        <a href="{{$setting['whatsup']}}" class="text-dark">
                            <i class="fab fa-whatsapp fa-2x"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
