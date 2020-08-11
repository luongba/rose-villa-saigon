@extends('master')
@section('content')
  <div class="innerpage-style1 ev-page">
    <span class="leftpageimg"></span>
    <span class="rightpageimg"></span>
    <section class="banner-innerpage">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="title-innerpage2">
              <span><span style="display: none;">{{ trans('pages.Events') }}</span></span>
            </h1>
          </div>
        </div>
      </div>   
    </section>
    <section class="innercontent">
      @foreach($list_area_event as  $key =>$val)
      @php
          $so_du = $key % 2;
          if ($so_du == 0){
           $float = 'event-left';
         }else{
          $float = 'event-right';
        }
        @endphp
      <div class="event-elm {{$float}}">
        <div class="event-ct">
          <div class="bgevent-ct">
            <h3 class="title-post-1">{!!$val->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale')!!}</h3>
            <div class="ctevent">
              {!!$val->getTranslatedAttribute('description', config('app.locale'), 'fallbackLocale')!!}
            </div>
            @auth
              <button-show-modal 
                :classname="'bookingaction radius_4'" 
                :text="'Booking Event'"
                :type="'0'"
                :booking_id="{{$val->id}}"
              ></button-show-modal>
            @else
                <button data-toggle="modal" data-target="#popup-login" type="button" class="btn btn-secondary bookingaction radius_4">Booking Event</button>
            @endauth
            <div class="clear"></div>
          </div>
        </div>
        <div class="eventimg">
          <img  src="{{$val->UrlThumb}}" />
        </div>
      </div>
      @endforeach
    </section>
  </div>
  <booking-form :text="'Booking Event'"></booking-form>
@endsection


@section('script')
<script>
      // function ready() {
      //     setTimeout(function(){
      //       $('body').find('.loading').remove();
      //       $('body').find('.header').css('visibility','visible');
      //       $('body').find('#page-wrap').css('visibility','visible');
      //       $('body').find('.content-custom-width').css('visibility','visible');
      //     }, 3000);
      // }

      // document.addEventListener("DOMContentLoaded", ready);
    </script>
@endsection
