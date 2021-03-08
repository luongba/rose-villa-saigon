@extends('master')
@section('content')
  <main>
    <div class="scroller">
      <div class="slideshow scroller__slideshow">
        @if($area_event->ListImageGallery)
          @foreach( $area_event->ListImageGallery as $val_img)
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
      <section class="innercontent content-inner100">
        <div class=" ctbox1">
          <h1 class="title-innerpage2">
            <span><span>{!!$area_event->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale')!!}</span></span>
          </h1>
          <div class="abct-elm event-abct-elm">
            {!!$area_event->getTranslatedAttribute('description', config('app.locale'), 'fallbackLocale')!!}
          </div>
          <div class="buttonbk">
              @auth
                <button-show-modal 
                  :classname="'bookingaction radius_4'" 
                  :text="'Booking Event'"
                  :type="'0'"
                  :booking_id="{{$area_event->id}}"
                ></button-show-modal>
              @else
                  <button data-toggle="modal" data-target="#popup-login" type="button" class="btn btn-secondary bookingaction radius_4">Booking Event</button>
              @endauth
          </div>
          <div class="clear"></div>
        </div>
      </section>
      <booking-form :text="'Booking Event'"></booking-form>
    </div>
    </div>
  </main>

<link rel="stylesheet" href="{{asset('public/rosevilla/style.css')}}" type="text/css" media="screen" />
<div class="spa-menu">
  <ul class="sub-menu">
      @foreach($list_events as $val_events)
                <li><a href="{{route('singleEvents',['slug'=>$val_events->slug])}}">{{$val_events->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale')}}</a></li>
                @endforeach
  </ul>
</div>
@endsection



@section('script')
<script src="{{asset('public/rosevilla/enquire.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/rosevilla/slick.min.js')}}"></script>
<script src="{{asset('public/rosevilla/script.js')}}" type="text/javascript"></script>

    
@endsection

