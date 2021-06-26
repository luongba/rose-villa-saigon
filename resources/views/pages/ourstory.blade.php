  <div class="row no-gutters row-set style">
    <div class="col col-xl-7 col-lg-7 col-md-7 col-sm-12" style="background-color: #fff; height: 100vh">
      <div class="about-story">
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
    <div class="col col-xl-5 col-lg-5 col-md-5 col-sm-12" style="height: 100vh">
      <img src="{{asset('').'public/storage/'.$singlepage->image}}" alt="" style="width: 100%; height: 100%; ">
    </div>
  </div>