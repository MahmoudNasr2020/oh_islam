@extends('site.layouts.app')
@section('title')
    {{ setting()->sitename_ar }} | ورد اليوم
@endsection
@section('content')
    <div class="container">
        <div class="panel panel-danger" id="azkar-panel">
            <div class="panel-heading text-center">
                <span class="zkername arabicfont">وردك اليوم</span>
            </div>
            <div class="panel-body">
                @if($werds->count()>0)
                    @foreach($werds as $werd)
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="zekr-style arabicfont text-justify bg-default img-rounded" style="padding: 10px;">
                                {!! $werd->werd !!}
                            </div>

                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="zekr-style arabicfont text-justify bg-default img-rounded" style="padding: 10px;">
                                <p style="text-align:right"><span style="color:#d35400"><span style="font-size:28px">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</span></span></p>

                                <p style="text-align:right"><span style="font-size:28px">اقْرَأْ بِاسْمِ رَبِّكَ الَّذِي خَلَقَ (1) خَلَقَ الْإِنْسَانَ مِنْ عَلَقٍ (2) اقْرَأْ وَرَبُّكَ الْأَكْرَمُ (3) الَّذِي عَلَّمَ بِالْقَلَمِ (4) عَلَّمَ الْإِنْسَانَ مَا لَمْ يَعْلَمْ (5) كَلَّا إِنَّ الْإِنْسَانَ لَيَطْغَى (6) أَنْ رَآهُ اسْتَغْنَى (7) إِنَّ إِلَى رَبِّكَ الرُّجْعَى (8) أَرَأَيْتَ الَّذِي يَنْهَى (9) عَبْدًا إِذَا صَلَّى (10) أَرَأَيْتَ إِنْ كَانَ عَلَى الْهُدَى (11) أَوْ أَمَرَ بِالتَّقْوَى (12) أَرَأَيْتَ إِنْ كَذَّبَ وَتَوَلَّى (13) أَلَمْ يَعْلَمْ بِأَنَّ اللَّهَ يَرَى (14) كَلَّا لَئِنْ لَمْ يَنْتَهِ لَنَسْفَعًا بِالنَّاصِيَةِ (15) نَاصِيَةٍ كَاذِبَةٍ خَاطِئَةٍ (16) فَلْيَدْعُ نَادِيَهُ (17) سَنَدْعُ الزَّبَانِيَةَ (18) كَلَّا لَا تُطِعْهُ وَاسْجُدْ وَاقْتَرِبْ (19)</span></p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="zekr-style arabicfont text-justify bg-default img-rounded" style="padding: 10px;">
                                <p style="text-align:right"><span style="font-size:28px">حديث أبي هريرة رضي الله عنه <span style="color:#d35400">عن النّبي صلّى الله عليه وسلّم </span>قال: [إن <span style="color:#2ecc71">اللهَ </span>تعالى يقولُ&nbsp;: قسمتُ الصلاةَ بيني وبين عبدي نصفينِ ، نصفُها لي ونصفُها لعبدي ولعبدي ما سألَ ، فإذا قالَ&nbsp;: { الحمدُ <span style="color:#16a085">للهِ </span>ربِّ العالمين } قالَ <span style="color:#16a085">اللهُ&nbsp;</span>: حمِدني عبدي ، وإذا قالَ&nbsp;: { الرحمنُ الرحيمُ } قالَ <span style="color:#16a085">اللهُ&nbsp;</span>: أثنى عليَّ عبدي ، وإذا قالَ&nbsp;: { مالكِ يومِ الدينِ } قال <span style="color:#1abc9c">اللهُ </span>عز وجل&nbsp;: مجّدني عبدي ، وفي روايةٍ فوَّضَ إليَّ عبدي ، وإذا قالَ&nbsp;: { إياكَ نعبدُ وإياكَ نستعينُ } قال&nbsp;: فهذه الآيةُ بيني وبين عبدي نصفينِ ولعبدي ما سألَ ، فإذا قالَ&nbsp;: { اهدنا الصراطَ المستقيمَ صراطَ الذين أنعمتَ عليهم غيرِ المغضوبِ عليهم ولا الضالينَ } قال&nbsp;: فهؤلاءِ لعبدي ولعبدي ما سألَ]</span></p>
                            </div>

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
