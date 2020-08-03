@extends('master')
@section('content')
  <div class="innerpage-style1 fd-page">
    <span class="leftpageimg"></span>
    <span class="rightpageimg"></span>
    <section class="banner-innerpage">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {{-- <h1>
              <span class="title-icon-left"></span>
              <span class="title-icon-right"></span>
              <span class="title-icon-top"></span>
              <span class="title-icon-bottom"></span>
               Food & Drink
            </h1> --}}
            <h1 class="title-innerpage2">
              <span><span style="display: none;">Food Drink</span></span>
            </h1>
          </div>
        </div>
      </div>   
    </section>
    <section class="innercontent">
      @foreach($list_food_drink as $key =>$val)
          @php
          $so_du = $key % 2;
          if ($so_du == 0){
           $float = 'fd-left';
         }else{
          $float = 'fd-right';
        }
        @endphp

        <div class="fd-elm {{$float}}">
          <div class="fdct">
              <h3 class="title-post-1">{{$val->title}}</h3>
              <div class="ctevent">
                {!!$val->description!!}
              </div>
              @auth
                <button-show-modal 
                  :classname="'bookingaction radius_4'" 
                  :text="'Booking Table'"
                  :type="'1'"
                  :booking_id="{{$val->id}}"
                ></button-show-modal>
              @else
                <button data-toggle="modal" data-target="#popup-login" type="button" class="btn btn-secondary bookingaction radius_4">Booking Table</button>
              @endauth
          </div>
          <div class="fdimg">
            <img  src="{{$val->UrlThumb}}" />
          </div> 
        </div>
       
      @endforeach
      <booking-form :text="'Booking Table'"></booking-form>
    </section>
  </div>
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
