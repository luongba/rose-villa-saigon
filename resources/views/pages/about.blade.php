@extends('master')
@section('content')
  <div class="innerpage-style1 about-page">
    <span class="leftpageimg"></span>
    <span class="rightpageimg"></span>
    <section class="innercontent content-inner50">
        <div class="about-ct ctbox1">
          @if($singlepage)
          <h1 class="title-innerpage2">
            <span><span>{!!$singlepage->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale')!!}</span></span>
          </h1>
          <div class="abct-elm scrollcustom">
            {!!$singlepage->getTranslatedAttribute('body', config('app.locale'), 'fallbackLocale')!!}
          </div>
          <div class="clear"></div>
          @else
            <h1 class="title-innerpage2">
            <span><span>{!!'No Data'!!}</span></span>
          </h1>
          @endif
        </div>
    </section>
  </div>
@endsection