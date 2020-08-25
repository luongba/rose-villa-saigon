@extends('master')
@section('content')
  @foreach($list_wellness_beauty as  $key =>$val)
    @php
      $so_du = $key % 2;
      if ($so_du == 0){
        $ctshow = 'ctlay-left';
       }else{
        $ctshow = 'ctlay-right';
      }
    @endphp
    <div class="sfe sfe{{ $key }} innerpage-style1 {{$ctshow}}" style="background:url('{{$val->UrlThumb}}') no-repeat center center; background-size: cover;">
      <span class="leftpageimg"></span>
      <span class="rightpageimg"></span>
      <section class="innercontent content-inner50">
        <div class="about-ct ctbox1">
          <h1 class="title-innerpage2">
            <span><span>{{$val->name}}</span></span>
          </h1>
          <div class="abct-elm">
            {!!$val->getTranslatedAttribute('description', config('app.locale'), 'fallbackLocale')!!}
          </div>
          <div class="buttonbk">
            <a href="javascript:;" class="bookingaction radius_4">{{ trans('pages.viewmenu') }}</a>
            @auth
              <button-show-modal 
                :classname="'bookingaction radius_4'" 
                :text="'Booking Now'"
                :type="'2'"
                :booking_id="{{$val->id}}"
              ></button-show-modal>
            @else
                <button data-toggle="modal" data-target="#popup-login" type="button" class="btn btn-secondary bookingaction radius_4">{{ trans('pages.bookingspa') }}</button>
            @endauth
          </div>
          <div class="clear"></div>
        </div>
    </section>
  </div>
  @endforeach
  <booking-form :text="'Booking Now'"></booking-form>
@endsection