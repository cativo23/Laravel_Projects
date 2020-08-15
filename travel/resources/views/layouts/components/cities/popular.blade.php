
<div class="container container-custom margin_80_0" style="margin-top: 20px;">
    <div class="main_title_2" id="tours">
        <span><em></em></span>
        <h2>While You Are There</h2>
        <p>Our Popular Things To See & Do</p>
    </div>

    <div id="reccomended" class="owl-carousel owl-theme">
    @foreach ($xml_P1->POI as $nodo2)
            <div class="item">
                <div class="box_grid">
                    <figure>
                        <a href="{{$nodo2->FODORS_URL}}"><img src="{{ $nodo2->IMAGE }}" class="img-fluid"
                                                              alt="" width="800" height="533">
                            <div class="read_more"><span>Xperience More</span></div>
                        </a>
                    </figure>
                    <div class="wrapper">
                        <h3><a href="{{$nodo2->FODORS_URL}}">{{$nodo2['name']}}</a></h3>
                        <p>{!! $nodo2->REVIEW !!}</p>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach ($xml_P2->POI as $nodo3)
                <div class="item">
                    <div class="box_grid">
                        <figure>
                            <a href="{{$nodo3->FODORS_URL}}"><img src="{{ $nodo3->IMAGE }}" class="img-fluid"
                                                                  alt="" width="800" height="533">
                                <div class="read_more"><span>Xperience More</span></div>
                            </a>
                        </figure>
                        <div class="wrapper">
                            <h3><a href="{{$nodo3->FODORS_URL}}">{{$nodo3['name']}}</a></h3>
                            <p>{{$nodo3->REVIEW}}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($xml_P3->POI as $nodo3)
                <div class="item">
                    <div class="box_grid">
                        <figure>

                            <a href="{{$nodo3->FODORS_URL}}"><img src="{{ $nodo3->IMAGE }}"
                                                                  class="img-fluid" alt="" width="800" height="533">
                                <div class="read_more"><span>Xperience More</span></div>
                            </a>

                        </figure>
                        <div class="wrapper">
                            <h3><a href="{{$nodo3->FODORS_URL}}">{{$nodo3['name']}}</a></h3>
                            <p>{{$nodo3->REVIEW}}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($xml_P4->POI as $nodo3)
                <div class="item">
                    <div class="box_grid">
                        <figure>

                            <a href="{{$nodo3->FODORS_URL}}"><img src="{{ $nodo3->IMAGE }}"
                                                                  class="img-fluid" alt="" width="800" height="533">
                                <div class="read_more"><span>Xperience More</span></div>
                            </a>

                        </figure>
                        <div class="wrapper">
                            <h3><a href="{{$nodo3->FODORS_URL}}">{{$nodo3['name']}}</a></h3>
                            <p>{{$nodo3->REVIEW}}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($xml_P5->POI as $nodo3)
                <div class="item">
                    <div class="box_grid">
                        <figure>

                            <a href="{{$nodo3->FODORS_URL}}"><img src="{{ $nodo3->IMAGE }}"
                                                                  class="img-fluid" alt="" width="800" height="533">
                                <div class="read_more"><span>Xperience More</span></div>
                            </a>

                        </figure>
                        <div class="wrapper">
                            <h3><a href="{{$nodo3->FODORS_URL}}">{{$nodo3['name']}}</a></h3>
                            <p>{{$nodo3->REVIEW}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach ($xml_P6->POI as $nodo3)
                <div class="item">
                    <div class="box_grid">
                        <figure>

                            <a href="{{$nodo3->FODORS_URL}}"><img src="{{ $nodo3->IMAGE }}"
                                                                  class="img-fluid" alt="" width="800" height="533">
                                <div class="read_more"><span>Xperience More</span></div>
                            </a>

                        </figure>
                        <div class="wrapper">
                            <h3><a href="{{$nodo3->FODORS_URL}}">{{$nodo3['name']}}</a></h3>
                            <p>{{$nodo3->REVIEW}}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- /carousel -->
        <p class="btn_home_align"><a id="toursBtn" href="https://reservations.travel.com/Tours/List?af=AF-TXRM" class="btn_1 rounded"> Xperience More Tours</a></p>
    <div id="hiddenFormContainer" style="display: none;"></div>
</div>
<script>
    var tourRedirect = false;

    function redirect(dest){
        let select = jQkdo('#EtDestinySelect');
        select.val(dest);
        var n=jQkdo(document.querySelector("#EtDestinySelect")).val();
        jQkdo("#EtDestinyId").val(n);
        jQkdo("#EtDestinyNameTour").val(jQkdo("#EtDestinySelect option:selected").text());
        jQkdo("#EtIdsTour").val("0");
        let button = document.getElementById('TourButton');
        if (tourRedirect===true){
            button.click();
            tourRedirect = false;
        }
    }
    function selectTab(element){
        element.click();
    }
    function renderForm(data){
        jQuery("#hiddenFormContainer").html(data);
        console.log(data);
        const liquidWaiting = document.getElementById("liquidWaiting");
        if(liquidWaiting.getAttribute("style") === "display: none;"){
            selectTab(document.getElementById("viewTours"));
            let select = document.getElementById("EtDestinySelect");
            console.log(select.children);
            if(select.children.length > 0){
                redirect(parseInt("{{ $dropdownDestinationValueTour  }}"));
                Swal.close();
            }else{
                document.getElementById("EtDestinySelect").addEventListener("DOMNodeInserted", function(e){
                    redirect(parseInt("{{ $dropdownDestinationValueTour  }}"));
                    Swal.close();
                });
            }
        } else {
            // Observing for liquid waiting attribute changes
            const liquidWaitingObserver = new MutationObserver(function(mutation){
                mutation.forEach(function(mutation){
                    if(mutation.type === "attributes") {
                        if(liquidWaiting.getAttribute("style") === "display: none;") {
                            selectTab(document.getElementById("viewTours"));
                            let select = document.getElementById("EtDestinySelect");
                            console.log(select.children);
                            if(select.children.length > 0){
                                redirect(parseInt("{{ $dropdownDestinationValueTour  }}"));
                                Swal.close();
                            }else{
                                document.getElementById("EtDestinySelect").addEventListener("DOMNodeInserted", function(e){
                                    redirect(parseInt("{{ $dropdownDestinationValueTour  }}"));
                                    Swal.close();
                                });
                            }
                            liquidWaitingObserver.disconnect();
                        }
                    }
                });
            });

            liquidWaitingObserver.observe(liquidWaiting, {attributes: true});
        }
    }
    const toursBtn = document.getElementById("toursBtn");
    toursBtn.onclick = function(){
        tourRedirect = true;
        Swal.fire({
            title: 'Loading tours'
        });
        Swal.showLoading();
        (function(a){if(typeof define==='function'&&define.amd){define(['jquery'],a)}else{a(jQuery)}}(function(jQuery){if(jQuery.support.cors||!jQuery.ajaxTransport||!window.XDomainRequest){return}var n=/^https?:\/\//i;var o=/^get|postjQuery/i;var p=new RegExp('^'+location.protocol,'i');jQuery.ajaxTransport('* text html xml json',function(j,k,l){if(!j.crossDomain||!j.async||!o.test(j.type)||!n.test(j.url)||!p.test(j.url)){return}var m=null;return{send:function(f,g){var h='';var i=(k.dataType||'').toLowerCase();m=new XDomainRequest();if(/^\d+jQuery/.test(k.timeout)){m.timeout=k.timeout}m.ontimeout=function(){g(500,'timeout')};m.onload=function(){var a='Content-Length: '+m.responseText.length+'\r\nContent-Type: '+m.contentType;var b={code:200,message:'success'};var c={text:m.responseText};try{if(i==='html'||/text\/html/i.test(m.contentType)){c.html=m.responseText}else if(i==='json'||(i!=='text'&&/\/json/i.test(m.contentType))){try{c.json=jQuery.parseJSON(m.responseText)}catch(e){b.code=500;b.message='parseerror'}}else if(i==='xml'||(i!=='text'&&/\/xml/i.test(m.contentType))){var d=new ActiveXObject('Microsoft.XMLDOM');d.async=false;try{d.loadXML(m.responseText)}catch(e){d=undefined}if(!d||!d.documentElement||d.getElementsByTagName('parsererror').length){b.code=500;b.message='parseerror';throw'Invalid XML: '+m.responseText;}c.xml=d}}catch(parseMessage){throw parseMessage;}finally{g(b.code,b.message,c,a)}};m.onprogress=function(){};m.onerror=function(){g(500,'error',{text:m.responseText})};if(k.data){h=(jQuery.type(k.data)==='string')?k.data:jQuery.param(k.data)}m.open(j.type,j.url);m.send(h)},abort:function(){if(m){m.abort()}}}})}));
        const mediaQuery = window.matchMedia("(max-width: 768px)");
        let url = "";
        if(mediaQuery.matches){
            url = "https://reservations.travel.com/Search/Box?af=AF-TXSY&ln=ING&cu=US";
        }else{
            url = "https://reservations.travel.com/Search/Box?af=AF-TXRM&ln=ING&cu=US";
        }
        jQuery.ajax({
            type: "post",
            url: url,
            success: function (data) {
                renderForm(data);
            },
            error: function(xhr, status, e){

                // POST REQUEST WAS NOT WORKING

                jQuery.ajax({
                    type: "get",
                    url: url,
                    success: function (data) {
                        renderForm(data);
                    },
                    error: function(xhr, status, e){
                        console.log(e);
                    },
                });
            },
        });
    };
</script>
<!-- /container -->
