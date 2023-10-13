<nav id="top-area-container" class="navbar navbar-default navbar-static-top top-navbar" role="navigation">
    <div class="container-fluid">
        <style>
            #welcome-area .nav>li>a {
                padding: 4px 10px;
            }
        </style>
            <div class="navbar-header">
                <span class="span-name" style='font-size: 20px;color: white;position: relative;top: 19px;right: -9px;font-family: "Naskh", "Hafs", "Adobe Arabic", "Simplified Arabic", "Traditional Arabic", "Arabic Typesetting", "Times New Roman", "Tahoma", "Arial", "serif";'>وا إسلاماه</span>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('web.index') }}">
                    <img src="{{ asset('storage/'.setting()->logo)  }}" alt="وا إسلاماه" title="وا إسلاماه" style="padding-bottom:4px;" />

                </a>

            </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav" style="position: relative;left: -24%;font-size: 21px;">
                @php
                    $color_main ='';
                    $color_video ='';
                    $color_werds ='';
                       if(request()->segment(1) == '')
                       {
                           $color_main ='#18bc9c';
                       }
                       elseif (request()->segment(1) == 'werds')
                       {
                           $color_werds ='#18bc9c';
                       }
                       elseif (request()->segment(1) == 'video')
                       {
                           $color_video ='#18bc9c';
                       }
                @endphp
                <li>
                    <a href="{{ route('web.index') }}"  style='font-family: "Naskh", "Hafs", "Adobe Arabic", "Simplified Arabic", "Traditional Arabic", "Arabic Typesetting", "Times New Roman", "Tahoma", "Arial", "serif";color: {{ $color_main }}'>الأذكار</a>
                </li>
                <li>
                    <a href="{{ route('web.werd') }}" style='font-family: "Naskh", "Hafs", "Adobe Arabic", "Simplified Arabic", "Traditional Arabic", "Arabic Typesetting", "Times New Roman", "Tahoma", "Arial", "serif";color: {{ $color_werds }}'>ورد اليوم</a>
                </li>
                <li>
                    <a href="{{ route('web.video') }}" style='font-family: "Naskh", "Hafs", "Adobe Arabic", "Simplified Arabic", "Traditional Arabic", "Arabic Typesetting", "Times New Roman", "Tahoma", "Arial", "serif";color: {{ $color_video }}'>فيديو اليوم</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
