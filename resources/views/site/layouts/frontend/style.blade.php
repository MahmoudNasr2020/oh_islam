<meta http-equiv='content-Type' content='text/html; charset=UTF-8'/>
<meta type='description' content='{{ setting()->description }}'/>
<title>@yield('title')</title>
<link rel="shortcut icon" href="{{ asset('storage/'.setting()->logo) }}">
<link rel="stylesheet" type="text/css" href="{{ asset('site/theme/Arabic/views/style.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('site/js/bstheme/flatly/bootstrap.min.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('site/js/apprtl.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('site/js/fa/css/font-awesome.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('site/js/select/css/bootstrap-select.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('site/theme/Arabic/views/appover.css') }}" />

<script type="text/javascript" src="{{ asset('site/js/jquery.js') }}" charset="utf-8"></script>
<script type="text/javascript" src="{{ asset('site/js/app.js') }}" charset="utf-8"></script>
<script type="text/javascript" src="{{ asset('site/js/select/js/bootstrap-select.min.js') }}" charset="utf-8"></script>
<script type="text/javascript" src="{{ asset('site/js/site.js') }}" charset="utf-8"></script>
<script src="{{ asset('site/js/azkar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/js/jquery.jsocial.js') }}"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<style>
    body {
        background: #e1e8ea !important;
    }

    @media (min-width: 1025px) {

        .container,
        .container-fluid {
            width: 1024px !important;
        }
    }
    @media (max-width: 767px) {

        .span-name{
            display:none !important;
        }
    }
    @media (max-width: 750px) {

        .nav{
            left:0 !important;
        }
    }

    @media (max-width: 460px) {

        .zekr-row{
            display:block !important;
        }
    }



</style>
<link rel="stylesheet" type="text/css" href="{{ asset('site/theme/Arabic/views/azkar.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('site/js/jquery.jsocial.css') }}" />


<style>
    .arabicfont {
        font-family: "Naskh", "Hafs", "Adobe Arabic", "Simplified Arabic", "Traditional Arabic", "Arabic Typesetting", "Times New Roman", "Tahoma", "Arial", "serif";
        line-height: 140%;
    }

    .zekr-style {
        font-size: 28px;
        font-weight: normal;
        line-height: 140%;
    }
</style>
@yield('style')
