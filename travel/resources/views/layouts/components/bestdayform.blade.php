<div id="liquidBoxContainer"></div>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script>
    function fixHeader(){
        jQuery("#liquidBoxContainer").css(
            "padding-top", "10px"
        );
    }

    function selectTab(element){
        console.log("Tab selected")
        console.log(element)
        element.click();
        selectDropdownItem(element);
    }
    function selectDropdownItem(element){
        let name;
        let code = parseInt("{{ $name }}");
        if(isNaN(code)){
            name = "{{ $name }}";
        } else{
            name = code;
        }

        let select;
        switch(element.id){
            case "viewPackages":
                select = document.getElementById("EtDestinySelectPkg");
                if(select.children.length > 0){
                    selectPackage(name);
                }else{
                    document.getElementById("EtDestinySelectHtl").addEventListener("DOMNodeInserted", function(e){
                        selectPackage(name);
                    });
                }
                break;
            case "viewHotels":
                select = document.getElementById("EtDestinySelectHtl");
                if(select.children.length > 0){
                    selectHotels(name);
                }else{
                    document.getElementById("EtDestinySelectHtl").addEventListener("DOMNodeInserted", function(e){
                        selectHotels(name);
                    });
                }
                break;
            case "viewTours":
                select = document.getElementById("EtDestinySelect");
                if(select.children.length > 0){
                    selectTours(name);
                }else{
                    document.getElementById("EtDestinySelect").addEventListener("DOMNodeInserted", function(e){
                        selectTours(name);
                    });
                }
                break;
            default:
                break;
        }
    }

    function selectPackage(name){
        var self = document.getElementById("EtDestinySelectPkg");
        self.value = name;
        jQkdo("#EtdtPackage").val(jQkdo(self).find("option:selected").attr('data-ds'));
        jQkdo("#EtDestinyName").val(jQkdo(self).find("option:selected").text());
        jQkdo("#EtWthArr").val("1");
        jQkdo("#EtIATds").val("");
    }

    function selectFlights(name){
        // TODO: The bestday form isn't working
    }

    function selectHotels(name){
        let element = document.getElementById("EtDestinySelectHtl");
        element.value = name;
        let select = jQkdo('#EtDestinySelectHtl');
        select.val(name);
        var DestId = jQkdo(document.querySelector("#EtDestinySelectHtl")).find("option:selected").attr('data-ds');
        jQkdo("#EtHoteldt").val(DestId);
        jQkdo("#EtHt").val("");
        jQkdo("#EtHotelRate").val("");
        jQkdo("#EtTypeSearchHotel").val("L");
    }

    function selectCars(name){
        // TODO: ask, because are text inputs
    }

    function selectTours(name){
        let select = jQkdo('#EtDestinySelect');
        select.val(name);
        var n=jQkdo(document.querySelector("#EtDestinySelect")).val();
        jQkdo("#EtDestinyId").val(n);
        jQkdo("#EtDestinyNameTour").val(jQkdo("#EtDestinySelect option:selected").text());
        jQkdo("#EtIdsTour").val("0");
    }

    function selectShuttles(name){
        // TODO: are text input

    }

    function renderForm(data){
        fixHeader();
        jQuery("#liquidBoxContainer").html(data).ready(function () {
            let element = document.getElementById("liquidWaiting");
            console.log(element);
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if(mutation.type==='attributes'){
                        console.log(element.getAttribute("style"));
                        if(element.getAttribute("style") === "display: none;"){
                            selectTab(document.getElementById('{{$tab}}'));
                        }
                    }
                });
            });

            observer.observe(element, {
                attributes: true //configure it to listen to attribute changes
            });
        });
    }
</script>
<script>
    (function(a){if(typeof define==='function'&&define.amd){define(['jquery'],a)}else{a(jQuery)}}(function(jQuery){if(jQuery.support.cors||!jQuery.ajaxTransport||!window.XDomainRequest){return}var n=/^https?:\/\//i;var o=/^get|postjQuery/i;var p=new RegExp('^'+location.protocol,'i');jQuery.ajaxTransport('* text html xml json',function(j,k,l){if(!j.crossDomain||!j.async||!o.test(j.type)||!n.test(j.url)||!p.test(j.url)){return}var m=null;return{send:function(f,g){var h='';var i=(k.dataType||'').toLowerCase();m=new XDomainRequest();if(/^\d+jQuery/.test(k.timeout)){m.timeout=k.timeout}m.ontimeout=function(){g(500,'timeout')};m.onload=function(){var a='Content-Length: '+m.responseText.length+'\r\nContent-Type: '+m.contentType;var b={code:200,message:'success'};var c={text:m.responseText};try{if(i==='html'||/text\/html/i.test(m.contentType)){c.html=m.responseText}else if(i==='json'||(i!=='text'&&/\/json/i.test(m.contentType))){try{c.json=jQuery.parseJSON(m.responseText)}catch(e){b.code=500;b.message='parseerror'}}else if(i==='xml'||(i!=='text'&&/\/xml/i.test(m.contentType))){var d=new ActiveXObject('Microsoft.XMLDOM');d.async=false;try{d.loadXML(m.responseText)}catch(e){d=undefined}if(!d||!d.documentElement||d.getElementsByTagName('parsererror').length){b.code=500;b.message='parseerror';throw'Invalid XML: '+m.responseText;}c.xml=d}}catch(parseMessage){throw parseMessage;}finally{g(b.code,b.message,c,a)}};m.onprogress=function(){};m.onerror=function(){g(500,'error',{text:m.responseText})};if(k.data){h=(jQuery.type(k.data)==='string')?k.data:jQuery.param(k.data)}m.open(j.type,j.url);m.send(h)},abort:function(){if(m){m.abort()}}}})}));
    function renderFromUrl(url) {
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
    }
    function defineUrlAndRenderForm(mediaQuery){
        if(mediaQuery.matches){
            renderFromUrl("{{env('BD_MOVILE_URL')}}");
        }else {
            renderFromUrl("{{env('BD_URL')}}");
        }
    }
    const mediaQuery = window.matchMedia("(max-width: 768px)");
    defineUrlAndRenderForm(mediaQuery);
    mediaQuery.addListener(defineUrlAndRenderForm);

</script>
