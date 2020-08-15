<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Travel">
    <title>Travel | @yield('section')</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('img/icono.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset('img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset('img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- Bootstrap core CSS-->
    <link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Main styles -->
    <link href="{{asset('admin/css/admin.css')}}" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="{{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Plugin styles -->
    <link href="{{ asset("admin/vendor/datatables/dataTables.bootstrap4.css")}}" rel="stylesheet">
    <link href="{{ asset("admin/vendor/dropzone.css")}}" rel="stylesheet">
    <link href="{{ asset("admin/css/date_picker.css")}}" rel="stylesheet">
    <link href="{{ asset("css/vendors.css")}}" rel="stylesheet">
    <!-- WYSIWYG Editor -->
    <link rel="stylesheet" href="{{ asset("admin/js/editor/summernote-bs4.css")}}">
    <!-- Your custom styles -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .ui-autocomplete {
            max-height: 100px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
        }
        /* IE 6 doesn't support max-height
         * we use height instead, but this forces the menu to always be this tall
         */
        * html .ui-autocomplete {
            height: 100px;
        }
    </style>
</head>

<body class="fixed-nav sticky-footer" id="page-top">
@component('admin.sidebar')
@endcomponent
<div class="content-wrapper">
    <div class="container-fluid">
        @yield('content')
    </div>
    <!-- /.container-fluid-->
</div>
<!-- /.container-wrapper-->
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © TRAVEL 2020</small>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Page level plugin JavaScript-->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" defer></script>
<script src="{{asset('admin/vendor/jquery.selectbox-0.2.js')}}"></script>
<script src="{{asset('admin/vendor/jquery.magnific-popup.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('admin/js/admin.js')}}"></script>
<!-- Custom scripts for this page-->
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script>
    window.onload = function (){
        $('.data-table').DataTable();
    }
</script>
<!-- Custom scripts for this page-->
<script src="{{ asset("admin/vendor/dropzone.min.js")}}"></script>
<script src="{{ asset("admin/vendor/bootstrap-datepicker.js")}}"></script>
<script>$('input.date-pick').datepicker();</script>
<!-- WYSIWYG Editor -->
<script src="{{ asset("admin/js/editor/summernote-bs4.min.js")}}"></script>
<script>
    $.ajax({
        url: 'https://api.github.com/emojis',
        async: false
    }).then(function(data) {
        window.emojis = Object.keys(data);
        window.emojiUrls = data;
    });

    $('.editor').summernote({
        fontSizes: ['10', '11', '12','13','14'],
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['fontsize', ['fontsize']],
            ['para', ['style','ul', 'ol', 'paragraph', 'height']],
            ['insert', ['picture', 'video', 'link', 'table']],
            ['misc', ['codeview']]
        ],
        placeholder: 'Write ...',
        tabsize: 2,
        height: 200,
        hint: {
            match: /:([\-+\w]+)$/,
            search: function (keyword, callback) {
                callback($.grep(emojis, function (item) {
                    return item.indexOf(keyword)  === 0;
                }));
            },
            template: function (item) {
                var content = emojiUrls[item];
                return '<img src="' + content + '" width="20"  alt=""/> :' + item + ':';
            },
            content: function (item) {
                var url = emojiUrls[item];
                if (url) {
                    return $('<img />').attr('src', url).css('width', 20)[0];
                }
                return '';
            }
        },
        callbacks: {
            onPaste: function (e) {
                var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                e.preventDefault();
                setTimeout(function(){
                    document.execCommand( 'insertText', false, bufferText );
                }, 10);
            }
        }
    });
    $('.dropdown-toggle').dropdown()
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $('.destapi').autocomplete({
        source: 'https://external.com/api/all',
        select: function (event, ui) {
           $(".destination_real").val(ui.item.value);
           $(".destapi").val(ui.item.label);
            return false;
        },
    });
</script>
@stack('scripts')
</body>
</html>
