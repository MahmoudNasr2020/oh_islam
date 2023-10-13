@extends('site.layouts.app')
@section('style')
<style>
    p {
        margin: 0 0 6.5px !important;
    }

</style>
@endsection
@section('title')
    {{ request()->segment(1) == '' ?setting()->sitename_ar  :  setting()->sitename_ar. ' | '.request()->segment(3) }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel ">
                    <div class="panel-body alert-primary">
                        <div class="btn-toolbar flexboxs text-center" role="toolbar" style="direction: rtl;">
                            @foreach($categories as $category)
                                <a href="{{ route('web.azkar',['id'=>$category->id,'name'=>str_replace(' ','_',$category->name)]) }}" id="cat-1"
                                   class="btn btn-success  btn-full-width catlink {{ $category->id == request()->segment(2) ? 'active':'' }}">
                                    <span class="catbutton arabicfont">{{ $category->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-info" id="azkar-panel">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 text-center control-label">
                        <div class="zkername arabicfont">{{ $azkars->description }}</div>
                    </div>
                </div>
            </div>
            <div class="panel-body" id="azkar-list-panel">
                @foreach($azkars->azkars as $azkar)
                    <div class="row zekr-row img-rounded equalizer" style="border-bottom: 1px solid transparent;display: -webkit-box;">
                        <div class="col-a col-xs-12 col-ms-9 col-sm-9 col-md-10 equal-height col-md-push-2 col-ms-push-3 col-sm-push-3">
                            <div class="zekr zekr-style arabicfont text-justify bg-default img-rounded">
                                {!! $azkar->zakar !!}
                            </div>
                            @if($azkar->simple_description != '')
                            <div class="text-justify zekrbless arabicfont img-rounded bg-default text-success" style="">
                                    <span class="zekrbless-content">{{  $azkar->simple_description  }}
                                        @if($azkar->description)
                                            <span class="fa fa-info-circle azkarinfo text-info" data-toggle="modal" data-target="#exampleModal{{ $azkar->id }}"
                                                  title="information معلومات" data-href=""></span>
                                            @include('site.pages.models.info',['text'=>$azkar->description])
                                        @endif
                            </div>
                            @endif
                        </div>
                        <div class="col-b col-xs-12 col-ms-3 col-sm-3 col-md-2 equal-height col-md-pull-10 col-ms-pull-9 col-sm-pull-9" style="min-height: 100% !important;">
                            <div class="zekr-counter bg-success img-rounded">
                                <table style="width: 100%; height: 100%;direction:rtl;">
                                    <tr>
                                        <td colspan="2">
                                            <div class="count-down" data-count="{{ $azkar->number }}">{{ $azkar->number }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="count-clock">{{ $azkar->number }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="bottom" height="100%" width="80%">
                                            <div class="zekr-count">{{ $azkar->number }}</div>
                                        </td>
                                        <td valign="bottom" height="100%">
                                            <div class="zekr-reset zekr-count">
                                                <span class="fa fa-undo fa-fw fa-lg" title="reset counter"></span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr style="height: 4px;margin: 2px 0px;" />
                    @endforeach
        </div>
    </div>
@endsection
