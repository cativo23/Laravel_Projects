<section class="add_bottom_45">
    <div class="main_title_3" id="hotels">
        <span><em></em></span>
        <h2>Where To Stay</h2>
        <p>Popular Hotels And Accommodations</p>
    </div>
    <div class="row">
        @foreach ($xml_P7->POI as $nodo3)
            <div class="col-xl-3 col-lg-6 col-md-6">
                <a href="{{$nodo3->FODORS_URL}}" class="grid_item">
                    <figure>
                        <img src="{{ $nodo3->IMAGE }}" style="height: 200px!important;" class="img-fluid" alt="">
                        <div class="info">
                            <h3>{{$nodo3['name']}}</h3>
                        </div>
                    </figure>
                </a>
            </div>
        @endforeach

        @foreach ($xml_P8->POI as $nodo3)


            <div class="col-xl-3 col-lg-6 col-md-6">
                <a href="{{$nodo3->FODORS_URL}}" class="grid_item">
                    <figure>
                        <img src="{{$nodo3->IMAGE}}" style="height: 200px!important;" class="img-fluid" alt="">
                        <div class="info">
                            <h3>{{$nodo3['name']}}</h3>
                        </div>
                    </figure>
                </a>
            </div>
        @endforeach

        @foreach ($xml_P9->POI as $nodo3)
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <a href="{{$nodo3->FODORS_URL}}" class="grid_item">
                        <figure>
                            <img src="{{$nodo3->IMAGE}}" style="height: 200px!important;" class="img-fluid" alt="">
                            <div class="info">
                                <h3>{{$nodo3['name']}}</h3>
                            </div>
                        </figure>
                    </a>
                </div>
        @endforeach
        @foreach ($xml_P10->POI as $nodo3)

                <div class="col-xl-3 col-lg-6 col-md-6">
                    <a href="{{$nodo3->FODORS_URL}}" class="grid_item">
                        <figure>
                            <img src="{{$nodo3->IMAGE}}" style="height: 200px!important;" class="img-fluid" alt="">
                            <div class="info">
                                <h3>{{$nodo3['name']}}</h3>
                            </div>
                        </figure>
                    </a>
                </div>
        @endforeach

    </div>
    <!-- /row -->
    <p class="btn_home_align"><a id="btnHotels" href="https://reservations.travel.com/Hotels/List?af=AF-TXRM" class="btn_1 rounded">Xperience More
            Hotels</a></p>
    <div id="hiddenFormContainerHotel" style="display: none;"></div>
</section>
<script>
    function redirectToHotel(dest){
        let select = jQkdo('#EtDestinySelectHtl');
        select.val(dest);

        var DestId = jQkdo(document.querySelector("#EtDestinySelectHtl")).find("option:selected").attr('data-ds');
        jQkdo("#EtHoteldt").val(DestId);
        jQkdo("#EtHt").val("");
        jQkdo("#EtHotelRate").val("");
        jQkdo("#EtTypeSearchHotel").val("L");


        let button = document.getElementById('HotelButton');
        button.click();
        jQuery("#hiddenFormContainerHotel").html("");
    }
    function selectHotelTab(element){
        element.click();
    }
    function renderFormHotel(data){

        jQuery("#hiddenFormContainerHotel").html(data);
        const liquidWaiting = document.getElementById("liquidWaiting");
        if(liquidWaiting.getAttribute("style") === "display: none;"){
            selectTab(document.getElementById("viewHotels"));
            let select = document.getElementById("EtDestinySelectHtl");
            if(select.children.length > 0){
                redirectToHotel("{{ $dropdownDestinationValueHotel  }}");
                Swal.close();
            }else{
                document.getElementById("EtDestinySelectHtl").addEventListener("DOMNodeInserted", function(e){
                    redirectToHotel("{{ $dropdownDestinationValueHotel  }}");
                    Swal.close();
                });
            }
        } else {
            // Observing for liquid waiting attribute changes
            const liquidWaitingObserver = new MutationObserver(function(mutation){
                mutation.forEach(function(mutation){
                    if(mutation.type === "attributes") {
                        if(liquidWaiting.getAttribute("style") === "display: none;") {
                            selectHotelTab(document.getElementById("viewHotels"));
                            let select = document.getElementById("EtDestinySelectHtl");
                            if(select.children.length > 0){
                                redirectToHotel("{{ $dropdownDestinationValueHotel  }}");
                                Swal.close();
                            }else{
                                document.getElementById("EtDestinySelectHtl").addEventListener("DOMNodeInserted", function(e){
                                    redirectToHotel("{{ $dropdownDestinationValueHotel  }}");
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
    const hotelsBtn = document.getElementById("btnHotels");
    hotelsBtn.onclick = function(){
        if ("{{$dropdownDestinationValueHotel}}"=='')
        {
            window.location.href = "/hotels";
            return;
        }
        Swal.fire({
            title: 'Loading hotels'
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
                renderFormHotel(data);
            },
            error: function(xhr, status, e){

                // POST REQUEST WAS NOT WORKING

                jQuery.ajax({
                    type: "get",
                    url: url,
                    success: function (data) {
                        renderFormHotel(data);
                    },
                    error: function(xhr, status, e){
                        console.log(e);
                    },
                });
            },
        });
    };
</script>
