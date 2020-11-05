@extends('master')
@section('content')
  <main>
    <div class="scroller">
      <div class="slideshow scroller__slideshow">
        @if($wellness_beauty->ListImageGallery)
          @foreach( $wellness_beauty->ListImageGallery as $val_img)
            <div class="slideshow__item" title="" style="background-image: url({{$val_img['url']}});">
              {{-- <img src="{{$val_img['url']}}"> --}}
            </div>
          @endforeach
      @else
        <div class="slideshow__item" title="" style="background-image: url({{asset('public/images/singleroom/room1.jpg')}});"></div>
        <div class="slideshow__item" title="" style="background-image: url({{asset('public/images/singleroom/room2.jpg')}});"></div>
        @endif
      </div>  
      <div class="scroller__launcher">
        <div class="slick-next scroller__launcher__arrow"></div>
      </div>
    </div>
    <div class="sfe sfe0 innerpage-style1">
      {{-- <span class="leftpageimg"></span> --}}
      <section class="innercontent content-inner100">
        <div class="no-frame ctbox1">
          <h1 class="title-innerpage2">
            <span><span>{!!$wellness_beauty->getTranslatedAttribute('name', config('app.locale'), 'fallbackLocale')!!}</span></span>
          </h1>
          <div class="abct-elm">
            {!!$wellness_beauty->getTranslatedAttribute('description', config('app.locale'), 'fallbackLocale')!!}
          </div>
          <div class="buttonbk">
            <a href="javascript:;" class="bookingaction radius_4">{{ trans('pages.viewmenu') }}</a>
            @auth
              <button-show-modal 
                :classname="'bookingaction radius_4'" 
                :text="'Booking Now'"
                :type="'2'"
                :booking_id="{{$wellness_beauty->id}}"
              ></button-show-modal>
            @else
                <button data-toggle="modal" data-target="#popup-login" type="button" class="btn btn-secondary bookingaction radius_4">{{ trans('pages.bookingspa') }}</button>
            @endauth
            
          </div>
          <div class="clear"></div>
        </div>
    </section>
  </div>
    </div>
      <booking-form :text="'Booking Now'"></booking-form>
  </main>
  

<link rel="stylesheet" href="{{asset('public/rosevilla/style.css')}}" type="text/css" media="screen" />
<div class="spa-menu">
    <ul>
      @foreach($list_wellness_beauty as $val_wellness_beauty)
        <li><a href="{{route('singleSpa',['slug'=>$val_wellness_beauty->slug])}}">{{$val_wellness_beauty->getTranslatedAttribute('name', config('app.locale'), 'fallbackLocale')}}</a></li>
      @endforeach
    </ul>
  </div>
@endsection

@section('script')
<script src="{{asset('public/rosevilla/enquire.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/rosevilla/slick.min.js')}}"></script>
<script src="{{asset('public/rosevilla/script.js')}}" type="text/javascript"></script>

    
@endsection

