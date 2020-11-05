@extends('master')
@section('content')
  @foreach($list_food_drink as $key =>$val)

    <div  class="innerpage-style1 ctlay-left single-food" style="background:url('{{$val->UrlThumb}}') no-repeat center center; background-size: cover;">
      <span class="leftpageimg"></span>
      <span class="rightpageimg"></span>
      <section class="innercontent content-inner50">
        <div class="about-ct ctbox1">
          <h1 class="title-innerpage2">
            <span><span>{!!$val->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale')!!}</span></span>
          </h1>
          <div class="abct-elm">
            {!!$val->getTranslatedAttribute('description', config('app.locale'), 'fallbackLocale')!!}
          </div>
          <div class="buttonbk">
            <a href="javascript:;" class="bookingaction radius_4">View menu</a>

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
          <div class="clear"></div>
        </div>
    </section>
  </div>
  @endforeach
  <booking-form :text="'Booking Table'"></booking-form>
  <div class="spa-menu">
  <ul class="sub-menu">
      @foreach($list_areaParty as $val_areaParty)
      <li><a href="{{route('singlefooddrink',['slug'=>$val_areaParty->slug])}}">{{$val_areaParty->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale')}}</a></li>
      @endforeach
  </ul>
</div>
@endsection


