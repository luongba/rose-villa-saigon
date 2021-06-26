@extends('masternew')
@section('css')
<style>
@media (max-width: 1600px){
.box__content-right {
    right: 8% !important;
}
    .header__list1 {
    position: absolute !important;
    top: 30% !important;
    left: 8% !important;
}
  .header__list2 {
    position: absolute !important;
    top: 30% !important;
    right: 6% !important;
}
.header__item{
  margin-right: 10px !important;
}
.header__item::after{
  margin-left: 10px !important;
}
}
@media (max-width: 1366px){
.box__content-right {
    right: 5% !important;
}
}
</style>

@endsection
@section('content')
          <audio id="audio" loop>

    <source type="audio/mp3" webkit-playsinline="true"  src="{{asset('public/assets/audio/Laura Fygi – La Vie En Rose.mp3')}}">

  </audio>

  <div class="audio-control loop">

      <span class="turnon" onclick="disableMute()" title="TURN ON SOUND">
        <i class="fas fa-volume-mute color-black"></i>
      </span>

      <span class="turnoff" onclick="enableMute()" title="MUTED">
        <i class="fas fa-volume-up color-black"></i>
      </span>

  </div>
<div class="contact-bg">
{{-- 	<img class="bg-left" src="{{ asset('public/images/bg/contact-left-bg.png') }}" alt="">
	<img class="bg-right" src="{{ asset('public/images/bg/contact-right-bg.png') }}" alt=""> --}}
  <div class="to-up" style="display: none;">
          <a><i class="fas fa-chevron-up"></i></a>
      </div>
	<div class="header-tclub">
		@include('layouts.headernew')
	</div>
            <div class="" style="padding-top: 60px">
                <div class="content-membership-enquiry-page" style="letter-spacing: 3px; ">
              <h1 class="title-bold-snell">
                <span>Warm Regards</span>
        </h1>

              <p class="text-content"><a class="phone-size" href="tel:+842836362211">(+84) 28 3636 2211 . </a><a class="phone-size" href="tel:+842837442211"> 3744 2211</a><br> NO.10 <span class="icon-resize">✦</span> STREET 58 <span class="icon-resize">✦</span> THAO DIEN WARD <br> THU DUC <span class="icon-resize">✦</span> HO CHI MINH CITY <span class="icon-resize">✦</span> VIETNAM</p>
	             <p class="text-content text-wc">
	             <a href="mailto:workwithus@rosevillasaigon.com" class="mailto-rose"><span class="member__style">Welcome</span>@ROSEVILLASAIGON.COM</a></p>
	          </p>
              <p class="text-content"><a style="color: #fff" href="{{ route('welcome') }}">ROSEVILLASAIGON.COM</a></p>
              <p></p>
              
              <p></p>
                
              </div>
            <div class="clear"></div>
          </div>
  
</div>

@endsection
@section('script')
<script>
          document.addEventListener('DOMContentLoaded', musicPlay);
    function musicPlay() {
        document.getElementById('audio').play();
    }
    function enableMute() { 
        document.getElementById("audio").play();
        var vid = document.getElementById("audio");

      vid.muted = true;

      $('.audio-control').removeClass('control-on').addClass('control-off');

    } 



    function disableMute() { 
        var vid = document.getElementById("audio");

      vid.muted = false;

      $('.audio-control').removeClass('control-off').addClass('control-on');

    } 
</script>
@endsection

