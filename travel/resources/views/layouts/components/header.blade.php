<header class="header menu_fixed">
    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Page Preload -->
    <div id="logo">
        <a id="linkLogo" href="{{ $destination->link_external }}">
            <img src="{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net",$destination->logo) }}" width="300"
                 data-retina="true"
                 alt="logo"
                 class="logo_normal"
            />
            <img src="{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net",$destination->logo_sticky) }}" width="300"
                 data-retina="true"
                 alt="logo"
                 class="logo_sticky"
            />
        </a>
    </div>

    <!-- /top_menu -->
    <a href="#menu" class="btn_mobile">
        <div class="hamburger hamburger--spin" id="hamburger">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </a>

    <script>
        window.onload = function () {
            var currentUrl = window.location.pathname;
            var urlArry = currentUrl.split("/");
            var isRes = urlArry[urlArry.length-2];
            var rest = urlArry[urlArry.length-1];
            if (isRes==='restaurants' || isRes === "article"|| isRes === "sights" || isRes === "shopping" || isRes === "nightlife"|| isRes === "arts"){
                currentUrl = currentUrl.replace("/restaurants/", "").replace("/article/", "").replace(rest, "").replace("/sights/", "").replace("/shopping/", "").replace("/nightlife/", "").replace("/arts/", "");
            }else{
                currentUrl = currentUrl.replace("packages", "").replace("flights", "").replace("hotels", "").replace("cars", "").replace("tours", "").replace("shuttles", "").replace("gallery", "").replace("restaurants", "").replace("adventure", "").replace("sights", "").replace("shopping", "").replace("nightlife", "").replace("arts", "").replace("about", "");
                if(currentUrl.slice(-1)==='/'){
                    currentUrl = currentUrl.slice(0, -1);
                    if(currentUrl.slice(-1)==='/'){
                        currentUrl = currentUrl.slice(0, -1);
                    }
                }
            }
            var linkz = document.getElementsByClassName("linkz");
            var i;
            for (i = 0; i < linkz.length; i++) {
                if(currentUrl.charAt(currentUrl.length-1)==="/"){
                    linkz[i].href = currentUrl + linkz[i].attributes[1].value;
                }else{
                    linkz[i].href = currentUrl + "/"+ linkz[i].attributes[1].value;
                }
            }


            var toAdd = '';
            var linkz2 = document.getElementsByClassName("linkz2");
            var i;
            for (i = 0; i < linkz2.length; i++) {
                if(currentUrl.charAt(currentUrl.length-1)==="/"){
                    toAdd = "city/";
                    linkz2[i].href = currentUrl + toAdd+linkz2[i].attributes[1].value;
                    console.log(linkz2[i].href);
                }else{
                    toAdd = "city/";
                    linkz2[i].href = currentUrl + "/"+ toAdd+linkz2[i].attributes[1].value;
                }
            }

            currentUrl= window.location.pathname;
            linkz = document.getElementsByClassName("link1");
            var i;
            for (i = 0; i < linkz.length; i++) {
                if(currentUrl.charAt(currentUrl.length-1)==="/"){
                    currentUrl = currentUrl.slice(0, -1);
                    linkz[i].href = currentUrl + linkz[i].attributes[1].value;
                }else{
                    linkz[i].href = currentUrl + linkz[i].attributes[1].value;
                }
            }

            let restBtn = document.getElementById("restLink");
            if(restBtn){
                currentUrl = window.location.pathname;
                currentUrl =  currentUrl + "/"+ restBtn.attributes[1].value;
                restBtn.href = currentUrl;
            }

            var galleryBtn = document.getElementById("galleryLink");
            if(galleryBtn){
                currentUrl = window.location.pathname;
                currentUrl =  currentUrl + "/"+ galleryBtn.attributes[1].value;
                galleryBtn.href = currentUrl;
            }

            restBtn = document.getElementsByClassName("linkRest1");
            currentUrl = window.location.pathname;
            var i;
            for (i = 0; i < restBtn.length; i++) {
                if(currentUrl.charAt(currentUrl.length-1)==="/"){
                    restBtn[i].href = currentUrl + restBtn[i].attributes[1].value;
                }else{
                    restBtn[i].href = currentUrl + "/"+ restBtn[i].attributes[1].value;
                }
            }

            let allRestbtn = document.getElementsByClassName("restAllLink");
            currentUrl = window.location.pathname;
            var i;
            for (i = 0; i < allRestbtn.length; i++) {
                if(currentUrl.charAt(currentUrl.length-1)==="/"){
                    allRestbtn[i].href = currentUrl + allRestbtn[i].attributes[1].value;
                }else{
                    allRestbtn[i].href = currentUrl + "/"+ allRestbtn[i].attributes[1].value;
                }
            }

            let linkHolder = document.getElementsByClassName("addHolder");
            currentUrl = window.location.pathname;
            var i;
            for (i = 0; i < linkHolder.length; i++) {
                if(currentUrl.charAt(currentUrl.length-1)==="/"){
                    linkHolder[i].href = currentUrl + linkHolder[i].attributes[1].value;
                }else{
                    linkHolder[i].href = currentUrl + "/"+ linkHolder[i].attributes[1].value;
                }
            }

            let logoLink = document.getElementById("linkLogo");
            let host = location.hostname;
            console.log(logoLink);
            console.log(host);
            console.log("{{Request::getHost()}}");
            if (host !== "{{Request::getHost()}}"){
                logoLink.href = "/";
            }
        };
    </script>
    <nav id="menu" class="main-menu">
        <ul>
            <li><span><a href="/">Home</a></span></li>
            @if(count($destination->children())>0)
                <li><span><a href="#!">Destinations</a></span>
                    <ul>
                        @foreach($destination->children() as $child)
                            @if($child->is_available)
                                @if(count($child->children())>0)
                                    <li><span><a href="{{$child->link_external}}">{{$child->name}} ({{count($child->children())}})</a></span>
                                        <ul>
                                            @foreach($child->children() as $grand_son)
                                                <li><a href="{{$grand_son->link_external}}">{{$grand_son->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{$child->link_external}}">{{$child->name}}</a></li>
                                @endif
                            @else
                                <li><a href="#!">{{$child->name}} (COMING SOON)</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endif
            <li><span><a href="/#tours">See & Do</a></span></li>
            <li><span><a href="/#info">Know</a></span></li>
            <li><span><a href="/#hotels">Stay</a></span></li>
            <li><span><a href="/#restaurants">Eat</a></span></li>
            <li><span><a href="#0">Shop</a></span>
                <ul>
                    <li><a href="/packages">Packages</a></li>
                    <li><a href="/flights">Flights</a></li>
                    <li><a href="/hotels/">Hotels</a></li>
                    <li><a href="/cars">Cars</a></li>
                    <li><a href="/adventure/">Tours</a></li>
                    <li><a href="/shuttles">Shuttles</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
