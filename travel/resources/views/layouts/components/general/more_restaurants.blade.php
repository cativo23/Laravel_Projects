<div class="container margin_60_35">
    <style>

        .font-icon-list {
            padding: 20px 0px 0px 0px;
            margin-bottom: 20px;
        }

        .font-icon-list:hover {
            cursor: pointer;
        }

        .font-icon-detail {
            text-align: center;
        }

        .font-icon-detail span:first-child {
            display: inline-block;
            transition: color 150ms linear, background 150ms linear, font-size 150ms linear, width 150ms;
            padding: 10px 0px;
            width: 70px;
            font-size: 48px;
            color: #1a1a1a;
            border: 1px solid #eaeaea;
            border-radius: 3px;
        }

        .font-icon-name {
            font-size: 13px;
            margin-top: 15px;
            display: block;
            text-align: center;
            width: 100%;
            padding: 0;
            border: 0;
        }

        .font-icon-name:focus, .font-icon-name:active {
            outline: none;
        }

        .font-icon-code {
            max-height: 0;
            overflow: hidden;
            text-align: center;
            opacity: 0;
            transition: max-height 200ms linear, opacity 200ms linear;
        }

        .font-icon-code.show {
            max-height: 200px;
            opacity: 1;
        }

        .code-value, .unicode, .unicode-text {
            background: none;
            text-align: center;
            border: none;
            color: #a0a0a0;
        }

        .code-value {
            display: block;
            width: 100%;
        }

        .unicode, .unicode-text {
            color: #a0a0a0;
        }

        .unicode {
            float: left;
            font-family: "Pe-icon-7-stroke";
            text-align: right;
            width: 38%;
            padding-right: 5px;
        }

        .unicode-text {
            text-align: left;
            float: left;
            display: inline-block;
            width: 100px;
            border: none;
        }

        .unicode-text:focus,
        .unicode-text:active {
            outline: none;
        }

        .font-icon-list:hover .font-icon-name,
        .font-icon-list:hover .code-value,
        .font-icon-list:hover .unicode,
        .font-icon-list:hover .unicode-text,
        .font-icon-detail.zeroclipboard-is-hover .font-icon-name,
        .font-icon-detail.zeroclipboard-is-hover + .font-icon-code .code-value,
        .font-icon-detail.zeroclipboard-is-hover + .font-icon-code .unicode,
        .font-icon-detail.zeroclipboard-is-hover + .font-icon-code .unicode-text {
            cursor: text;
            color: #1a1a1a;
        }

        .font-icon-list:hover .font-icon-detail span:first-child,
        .font-icon-detail.zeroclipboard-is-hover span:first-child {
            color: #fff;
            background: #1a1a1a;
        }

        .font-icon-name::-moz-selection,
        .code-value::-moz-selection,
        .unicode::-moz-selection,
        .unicode-text::-moz-selection,
        .font-icon-name::-moz-selection {
            background: #aadce2;
            color: #1a1a1a;
        }

        .font-icon-name::selection,
        .code-value::selection,
        .unicode::selection,
        .unicode-text::selection,
        .font-icon-name::selection {
            background: #aadce2;
            color: #1a1a1a;
        }

        .font-icon-name::-moz-selection,
        .code-value::-moz-selection,
        .unicode::-moz-selection,
        .unicode-text::-moz-selection,
        .font-icon-name::-moz-selection {
            background: #aadce2;
            color: #1a1a1a;
        }

        a.box_news {
            position: relative;
            display: block;
            padding-left: 230px;
            color: #555;
            margin-bottom: 30px;
            min-height: 150px
        }

        @media (max-width: 767px) {
            a.box_news {
                min-height: inherit;
                padding-left: 0
            }
        }

        a.box_news figure {
            width: 200px;
            height: 150px;
            overflow: hidden;
            position: absolute;
            left: 0;
            top: 0
        }

        @media (max-width: 767px) {
            a.box_news figure {
                position: relative;
                width: auto
            }
        }

        a.box_news figure img {
            width: 250px;
            height: auto;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%) scale(1.1);
            -moz-transform: translate(-50%, -50%) scale(1.1);
            -ms-transform: translate(-50%, -50%) scale(1.1);
            -o-transform: translate(-50%, -50%) scale(1.1);
            transform: translate(-50%, -50%) scale(1.1);
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            -o-backface-visibility: hidden;
            backface-visibility: hidden
        }

        @media (max-width: 767px) {
            a.box_news figure img {
                width: 100%;
                max-width: 100%;
                height: auto
            }
        }

    </style>
    <div class="row">
        <div class="col-lg-6">
            <h2 style="text-align: center"> Restaurants by Neighborhood</h2>
            @foreach($areas_count as $area)
                <a class="box_news addHolder" holder="restaurants?area={{$area[0]['area']}}" href="" style="padding-left: 0px; min-height: 10px;">
                    <div class="col-6" style="margin: auto; padding: 11% 0px 0px;line-height: 200px; text-align: center;"><h4> {{ucwords($area[0]['area'])}} ({{$area[0]['count']??'0'}}) <i class="icon-right-open"></i></h4></div>
                </a>
            @endforeach
        </div>
        <div class="col-lg-6">
            <h2 style="text-align: center; margin-bottom: 40px;">Restaurants our Xpertz are Talking about</h2>

            @foreach($more_rest as $article)
                <a class="box_news addHolder" holder="article/{{$article->slug}}" href="">
                    <figure><img src="{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net",$article->image)}}" alt="">
                    </figure>
                    <h4>{{$article->title}}</h4>
                    <p>{{ substr($article->text, 0, 180) . (strlen($article->text) > 180 ? '...' : '')}}</p>
                </a>
            @endforeach
        </div>
        <!-- /box_news -->
    </div>
</div>
<!-- /container -->





