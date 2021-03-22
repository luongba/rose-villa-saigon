@extends('master')
@section('content')
{{--   <div class="content-box">
    <div class="content-left">
      <div class="about-ct ctbox1">
          @if($singlepage)
          <h1 class="title-innerpage-new">
            <span>{!!$singlepage->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale')!!}</span>
          </h1>
          <div class="abct-elmtt scrollcustom">
            {!!$singlepage->getTranslatedAttribute('body', config('app.locale'), 'fallbackLocale')!!}
          </div>
          <div class="clear"></div>
          @else
            <h1 class="title-innerpage2">
            <span><span>{!!'No Data'!!}</span></span>
          </h1>
          @endif
        </div>
    </div>
    <div class="content-right" style="background-image: url({{asset('').'public/storage/'.$singlepage->image}});">
    </div>
  </div> --}}
  <div class="row no-gutters row-set">
    <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12" style="background-color: #fff; height: 100vh">
      <div class="about-ct ctbox1">
          @if($singlepage)
          <h1 class="title-innerpage-new">
            <span>{!!$singlepage->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale')!!}</span>
          </h1>
          <div class="abct-elmtt scrollcustom">
            {!!$singlepage->getTranslatedAttribute('body', config('app.locale'), 'fallbackLocale')!!}
          </div>
          <div class="clear"></div>
          @else
            <h1 class="title-innerpage2">
            <span><span>{!!'No Data'!!}</span></span>
          </h1>
          @endif
        </div>
    </div>
    <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12" style="height: 100vh">
      <img src="{{asset('').'public/storage/'.$singlepage->image}}" alt="" style="object-fit: cover; width: 100%; height: 100%">
    </div>
  </div>
  {{-- <div class="innerpage-style1 about-page">
    <span class="leftpageimg"></span>
    <span class="rightpageimg"></span>
    <section class="innercontent content-inner50 hp_about">
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
    <section class="innerimage content-inner50 hp_about" style="background-image: url({{asset('').'public/storage/'.$singlepage->image}});">
    </section> --}}
  </div>
@endsection