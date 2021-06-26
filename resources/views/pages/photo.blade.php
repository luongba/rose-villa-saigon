@section('css')
<style>
	.lSSlideOuter .lSPager.lSGallery{
		height: 100px;
	}
	.lSSlideOuter .lSPager.lSGallery li{
		height: 100%;
	}
	.lSSlideOuter .lSPager.lSGallery img{
		height: 100% !important;
		width: 100% !important;
		object-fit: cover;
	}
</style>
@endsection
@extends('masternew')
@section('content')
<div class="bg-photo">
	<div class="box_container-scroll">
		<div class="header-tclub">
    @include('layouts.headernew')
  </div>
        <h1 class="title-innerpage-new">
                <span>Photo Gallery</span>
        </h1>
        <div class="w-840 mt-40 w-700">
			<ul id="imageGallery">
				<li  data-thumb="{{ asset('public/images/images/34.jpg') }}" data-src="{{ asset('public/images/images/34.jpg') }}">
				  <img class="img-w" src="{{ asset('public/images/images/34.jpg') }}" /> 
				 </a> 
				</li>
				<li  data-thumb="{{ asset('public/images/images/35.jpg') }}" data-src="{{ asset('public/images/images/35.jpg') }}"> 
					 <img class="img-w" src="{{ asset('public/images/images/35.jpg') }}" />
				</li>
				<li  data-thumb="{{ asset('public/images/images/36.jpg') }}" data-src="{{ asset('public/images/images/36.jpg') }}"> 
					 <img class="img-w" src="{{ asset('public/images/images/36.jpg') }}" />
				</li>
				<li  data-thumb="{{ asset('public/images/images/37.jpg') }}" data-src="{{ asset('public/images/images/37.jpg') }}">
				  <img class="img-w" src="{{ asset('public/images/images/37.jpg') }}" /> 
				
				</li>
				<li  data-thumb="{{ asset('public/images/images/38.jpg') }}" data-src="{{ asset('public/images/images/38.jpg') }}"> 
					 <img class="img-w" src="{{ asset('public/images/images/38.jpg') }}" />
				</li>
				<li  data-thumb="{{ asset('public/images/images/39.jpg') }}" data-src="{{ asset('public/images/images/39.jpg') }}"> 
					 <img class="img-w" src="{{ asset('public/images/images/39.jpg') }}" />
				</li>
				<li  data-thumb="{{ asset('public/images/images/40.jpg') }}" data-src="{{ asset('public/images/images/40.jpg') }}">
				  <img class="img-w" src="{{ asset('public/images/images/40.jpg') }}" /> 
				
				</li>	
				<li  data-thumb="{{ asset('public/images/images/41.jpg') }}" data-src="{{ asset('public/images/images/41.jpg') }}">
				  <img class="img-w" src="{{ asset('public/images/images/41.jpg') }}" /> 
				
				</li>

						</ul>

        </div>
	</div>
</div>

@endsection
@section('script')
<script src="{{ asset('public/js/lightslider.js') }}"></script>
<script type="text/javascript">
	           $(document).ready(function() {
    $('#imageGallery').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:8,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }   
    });  
  });
</script>
@endsection
