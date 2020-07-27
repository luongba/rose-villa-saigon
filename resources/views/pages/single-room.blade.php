@extends('master')
@section('content')
  <main>
    <div class="scroller">
      <div class="slideshow scroller__slideshow">
        <div class="slideshow__item" title="" style="background-image: url({{asset('public/images/singleroom/room1.jpg')}});"></div>
        <div class="slideshow__item" title="" style="background-image: url({{asset('public/images/singleroom/room2.jpg')}});"></div>
        <div class="slideshow__item" title="" style="background-image: url({{asset('public/images/singleroom/room3.jpg')}});"></div>
        <div class="slideshow__item" title="" style="background-image: url({{asset('public/images/singleroom/room4.jpg')}});"></div>
        <div class="slideshow__item" title="" style="background-image: url({{asset('public/images/singleroom/room5.jpg')}});"></div>
        <div class="slideshow__item" title="" style="background-image: url({{asset('public/images/singleroom/room6.jpg')}});"></div>
        <div class="slideshow__item" title="" style="background-image: url({{asset('public/images/singleroom/room7.jpg')}});"></div>
        <div class="slideshow__item" title="" style="background-image: url({{asset('public/images/singleroom/room8.jpg')}});"></div>
        <div class="slideshow__item" title="" style="background-image: url({{asset('public/images/singleroom/room9.jpg')}});"></div>
      </div>  
      <div class="scroller__launcher">
        <div class="slick-next scroller__launcher__arrow"></div>
      </div>
    </div>
    <div class="poster visual-pull-left-lap-and-up">
    	<div class="about-ct ctbox1">	
		    {{-- <h1 class="poster__title poster__title--ghost"></h1>
		    <h1 class="poster__title visual-pull-left-lap-and-up"></h1> --}}
			<h1 class="title-innerpage2">
		        <span><span>Single Room</span></span>
		    </h1>
		    <div class="abct-elm">
			    <div class="[ layout layout--medium ] room-details">
			    	<div class="leftroom">
				    	<div class="layout__item desk-one-whole room-details__amenities">
				          <div class="room-details__icons">
				            <div class="detailroom bed-number">50 / 58m2 | 2p</div>
				            <div class="detailroom person-number">4 người </div>
				          </div>
				        </div>
				        <div class="utility-room editor-style">
				            <strong>Tiện Ích:</strong>
				            <ul>
				                <li>Bể bơi mini</li>
				                <li>Bữa trưa tại phòng</li>
				                <li>Thẻ Vip Massage</li>
				                <li>Bể bơi mini</li>
				                <li>Bữa trưa tại phòng</li>
				                <li>Thẻ Vip Massage</li>
				                <li>Bể bơi mini</li>
				                <li>Bữa trưa tại phòng</li>
				                <li>Thẻ Vip Massage</li>
				            </ul> 
				          </div>
			    	</div>
			    	<div class="rightroom">
			    		<div class="layout__item desk-one-whole room-details__description">
				          	<div class="content-editer-room editor-style">
				            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
				            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
			        	</div>
			    	</div>
			    </div>
			</div>
		</div>
    </div>
  </main>

<link rel="stylesheet" href="{{asset('public/rosevilla/style.css')}}" type="text/css" media="screen" />
@endsection
@section('script')
<script src="{{asset('public/rosevilla/enquire.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/rosevilla/slick.min.js')}}"></script>
<script src="{{asset('public/rosevilla/script.js')}}" type="text/javascript"></script>
@endsection

