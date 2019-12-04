<div class="container">
    <div>
        <img src="/media/cite/banner.png" width="100%">
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto pr-0 text-right">
                @foreach($menu as $key=>$row)
                    @if($row['url'])
                        @if($row['article_id'])
                            <li class="nav-item pr-3 pr-lg-0 py-2 py-lg-0">
                                <a class="nav-link py-0 font12 px-lg-2"
                                   href="{{'/'.$row['article_id'].'/'.$row['url']}}">{{$row['name']}}</a>
                            </li>
                        @else
                            <li class="nav-item pr-3 pr-lg-0 py-2 py-lg-0">
                                <a class="nav-link py-0 font12 px-lg-2" href="{{$row['url']}}">{{$row['name']}}</a>
                            </li>
                        @endif

                    @else

                        <li class="nav-item dropdown pr-3 pr-lg-0 py-2 py-lg-0">
                            <a class="nav-link py-0 dropdown-toggle font12 pointer px-lg-2" id="navbarDropdown"
                               role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$row['name']}}
                            </a>
                            <div class="dropdown-menu bg-info" aria-labelledby="navbarDropdown">
                                @foreach($row['articles'] as $item)
                                    <a class="dropdown-item font12 text-right"
                                       href="{{'/'.$item['id'].'/'.$item['url']}}">{{$item['title']}}</a>
                                @endforeach
                            </div>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
    </nav>
</div>
