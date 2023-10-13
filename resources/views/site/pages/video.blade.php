@extends('site.layouts.app')
@section('title')
    {{ setting()->sitename_ar }} | فيديو اليوم
@endsection
@section('content')
    @php
        function getYoutubeId($url=''){

        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);

        return isset($match[1]) ?$match[1] : '';
        }
    @endphp
    <div class="container">
        <div class="panel panel-danger" id="azkar-panel">
            <div class="panel-heading text-center">
                <span class="zkername arabicfont">فيديو اليوم</span>
            </div>
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <iframe width="100%" height="530" src="https://www.youtube.com/embed/{{ getYoutubeId($video !='' ?$video->url :'https://www.youtube.com/watch?v=uf0N_6FmNLw') }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
