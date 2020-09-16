@extends('master')
@section('content')
  <main>
  	<div class="audio-control">
  		<span class="turnon" onclick="disableMute()" title="TURN ON SOUND"></span>
  		<span class="turnoff" onclick="enableMute()" title="MUTED"></span>
  	</div>
  	<audio id="audio" autoplay>
   		<source type="audio/mp3" src="{{asset('public/assets/audio/La vie en rose - Louis Armstrong.mp3')}}">
  	</audio>
    <div class="scroller">
      <div class="slideshow scroller__slideshow">
      	@if($singleroom->ListImageGallery)
	      	@foreach( $singleroom->ListImageGallery as $val_img)
	        	<div class="slideshow__item" title="" >
	        		<img src="{{$val_img['url']}}">
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
    <div class="poster visual-pull-left-lap-and-up">
    	<div class="about-ct ctbox1 singleframe">	
		    {{-- <h1 class="poster__title poster__title--ghost"></h1>
		    <h1 class="poster__title visual-pull-left-lap-and-up"></h1> --}}
			<h1 class="title-innerpage2">
		        <span><span>{{$singleroom->getTranslatedAttribute('name', config('app.locale'), 'fallbackLocale')}}</span></span>
		    </h1>
		    <div class="abct-elm singleroom-ct scrollcustom">
			    <div class="[ layout layout--medium ] room-details">
			    	<div class="leftroom">
				    	<div class="layout__item desk-one-whole room-details__amenities">
				          <div class="room-details__icons">
				            <div class="detailroom bed-number"><strong>{{$singleroom->area}}</strong> m2 | <strong>{{$singleroom->bed}}</strong> p</div>
				            {{-- <div class="detailroom person-number">{{$singleroom->person}} người </div> --}}
				            <div class="detailroom icondr">
				            	<div class="icr first-icr">	
				            		<img src="{{asset('public/images/images/logo-vien-den.png')}}">
				            	</div>
				            	<div class="icr">
				            		<img src="{{asset('public/images/images/giuong.png')}}">
				            	</div>
				            </div>
				          </div>
				        </div>
				        <div class="utility-room editor-style">
				            <strong>{{ trans('pages.Utilities') }}:</strong>
				            <ul>
				               {!!$singleroom->getTranslatedAttribute('benefit', config('app.locale'), 'fallbackLocale')!!}
				            </ul> 
				          </div>
			    	</div>
			    	<div class="rightroom">
			    		<div class="layout__item desk-one-whole room-details__description">
				          	<div class="content-editer-room editor-style">
				            	{!!$singleroom->getTranslatedAttribute('description', config('app.locale'), 'fallbackLocale')!!}
			        		</div>
			        	</div>
			    	</div>
			    </div>
			</div>
			<div class="bottomroom">
		      	<button-show-modal 
		            :classname="'bookingaction radius_4'" 
		            :text="'Booking Room'"
		            :type="'3'"
		            :booking_id="{{$singleroom->id}}"
		      	></button-show-modal>
			</div>
		</div>
    </div>
      <booking-form :text="'Booking Now'"></booking-form>
  </main>

<link rel="stylesheet" href="{{asset('public/rosevilla/style.css')}}" type="text/css" media="screen" />
@endsection
@section('script')
<script src="{{asset('public/rosevilla/enquire.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/rosevilla/slick.min.js')}}"></script>
<script src="{{asset('public/rosevilla/script.js')}}" type="text/javascript"></script>

    <script>
		var vid = document.getElementById("audio");

		function enableMute() { 
		  vid.muted = true;
		  $('.audio-control').removeClass('control-on').addClass('control-off');
		} 

		function disableMute() { 
		  vid.muted = false;
		  $('.audio-control').removeClass('control-off').addClass('control-on');
		} 

		// function checkMute() { 
		//   alert(vid.muted);
		// } 
	</script> 
@endsection

