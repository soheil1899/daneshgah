<div class="container ">
    <div class="bg-dark">
        <div class="footer-top row mx-0 border-bottom px-3">
            <div class="col-12 col-lg-6 text-right py-0 py-lg-2 px-1">
                <i class="fas fa-location-arrow footeritem ml-2"></i>
                <label class="footeritem font13 mb-0">
                    {{$setting['address']}}
                </label>

            </div>
            <div class="col-12 col-md-6 col-lg-3 text-left py-0 py-lg-2 px-1">
                <label class="footeritem font13 mb-0">{{$setting['email']}}</label>
                <i class="far fa-envelope footeritem mr-2"></i>
            </div>
            <div class="col-12 col-md-6 col-lg-3 text-left py-0 py-lg-2 px-1">
                <label class="footeritem font13 mb-0">{{$setting['tellphone']}}</label>
                <i class="fas fa-phone-square-alt footeritem mr-2"></i>
            </div>
        </div>


        <div class="row mx-0 py-4 px-3">
            <div class="col-12 col-md-4 text-right">
                <h4 class="font16 font-weight-bolder text-white mb-3">
                    {{$peyvand['name']}}
                </h4>
                <ul class="footerul pr-3">
                    @foreach($peyvand['articles'] as $article)
                        <li>
                            <i class="fas fa-angle-double-left footeritem ml-2"></i>
                            <a class="footeritem font13" href="{{$article['url']}}">
                                {{$article['title']}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-4 text-right">
                <h4 class="font16 font-weight-bolder text-white mb-3">
                    {{$electro['name']}}
                </h4>
                <ul class="footerul pr-3">
                    @foreach($electro['articles'] as $article)
                        <li>
                            <i class="fas fa-angle-double-left footeritem ml-2"></i>
                            <a class="footeritem font13" href="{{$article['url']}}">
                                {{$article['title']}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-4 text-right">
                <h4 class="font16 font-weight-bolder text-white mb-3">
                    {{$links['name']}}
                </h4>
                <ul class="footerul pr-3">
                    @foreach($links['articles'] as $article)
                        <li>
                            <i class="fas fa-angle-double-left footeritem ml-2"></i>
                            <a class="footeritem font13" href="{{$article['url']}}">
                                {{$article['title']}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

    </div>


    <div class="bg-danger textfooter text-center">
        <label class="mb-0 font12">تمامی حقوق مادی و معنوی این سایت مربوط به
            {{$setting['site_title']}}
            می
            باشد.</label>
    </div>
</div>



