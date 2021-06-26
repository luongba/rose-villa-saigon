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
{{-- <div class="shop-flower">
  <img  src="{{asset('public/images/imagesfloat/flower-lt.png')}}" class="flower flower1 flowerout" />
  <img  src="{{asset('public/images/imagesfloat/flower-ct.png')}}" class="flower flower2 flowerout" />
  <img  src="{{asset('public/images/imagesfloat/flower-rt.png')}}" class="flower flower3 flowerout" />
  <img  src="{{asset('public/images/imagesfloat/bird-cb.png')}}" class="flower flower4 flowerout" />
  <img  src="{{asset('public/images/imagesfloat/flower-lb.png')}}" class="flower flower5 flowerout" />
  <img  src="{{asset('public/images/imagesfloat/flower-rb.png')}}" class="flower flower6 flowerout" />
  <div class="textlanding scale0 textcontent">
          <h1 class="wctext textshop" id="textshop">Visit Our<br/>Atelier</h1>
  </div>
</div> --}}
  <div class="innerpage-style1 about-page bg-shop">
      <div class="to-up" style="display: none;">
          <a><i class="fas fa-chevron-up"></i></a>
      </div>
    <div class="header-tclub">
       @include('layouts.headernew')
    </div>
    
    <section class="innercontent simpe-content-page padding-shop">
    	<div class="container">
        <div class="center-shop">
          <h1 class="title-innerpage-new">
                <span>The Boutique</span>
        </h1>
          <p class="icon-style">✦✦✦</p>
          <div class="content-shop">
            <p class="title-club-content color-eee"><strong class="first-text">A</strong>t The Boutique, <br> <strong class="first-text">W</strong>e offer a unique collection of items, from our signature home décor <br>
              to a beautiful selection of shoes, clothing and accessories. <br>

              <strong class="first-text">E</strong>very item you see on property can be yours,
              and you can also add your own items to the collection. <br>

              <strong class="first-text">I</strong>t’s more than a boutique; it’s a carefully curated collection of art
              and inspiration reserved for you at ROSE VILLA SAIGON. <br>

              <strong class="first-text">F</strong>or further information, please contact our team at The Boutique.
              We are more than happy to assist and we hope you will
              enjoy this special shopping experience with us. </p>
          </div>
          <div class="text-shop">
            <p class="text-align-resize color-eee"><a class="phone-size" href="tel:+842836362211">(+84) 28 3636 2211 . </a><a class="phone-size" href="tel:+842837442211"> 3744 2211</a><br><a href="mailto:workwithus@rosevillasaigon.com" class="mailto-rose"><span class="member__style">Shop</span>@ROSEVILLASAIGON.COM</a></p>
          </div>
          </div>
        
        </div>
    		
    	</div>
    </section>
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
{{-- <script type="text/javascript">
  window.onload = function()
{
    let showflower = document.getElementsByClassName('flower')
    for( i = 0; i < showflower.length ; i++){
    	showflower[i].classList.remove('flowerout');
    }
    let showContent = document.getElementsByClassName('textlanding');
    showContent[0].classList.add('scale1');
    let hideFlower = document.getElementById('textshop');
	hideFlower.addEventListener('click', function(){
		showflower = document.getElementsByClassName('flower')
	    for( i = 0; i < showflower.length ; i++){
	    	showflower[i].classList.add('flowerout');
	    }
	     showContent = document.getElementsByClassName('textlanding');
	     showContent[0].classList.remove('scale1'); 
   		 showContent[0].classList.add('scale0'); 
   		 let showbox = document.getElementsByClassName('shop-flower');
   		 showbox[0].classList.add('d-0');
})
}

	
	

</script> --}}