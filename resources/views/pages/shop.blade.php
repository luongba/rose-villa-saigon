@extends('master')
@section('content')
<div class="shop-flower">
  <img  src="{{asset('public/images/imagesfloat/flower-lt.png')}}" class="flower flower1 flowerout" />
  <img  src="{{asset('public/images/imagesfloat/flower-ct.png')}}" class="flower flower2 flowerout" />
  <img  src="{{asset('public/images/imagesfloat/flower-rt.png')}}" class="flower flower3 flowerout" />
  <img  src="{{asset('public/images/imagesfloat/bird-cb.png')}}" class="flower flower4 flowerout" />
  <img  src="{{asset('public/images/imagesfloat/flower-lb.png')}}" class="flower flower5 flowerout" />
  <img  src="{{asset('public/images/imagesfloat/flower-rb.png')}}" class="flower flower6 flowerout" />
  <div class="textlanding scale0 textcontent">
          <h1 class="wctext textshop" id="textshop">Visit Our<br/>Atelier</h1>
  </div>
</div>
  <div class="innerpage-style1 about-page">
    <span class="leftpageimg"></span>
    <span class="rightpageimg"></span>
    <section class="innercontent simpe-content-page">
    	<div class="container">
    		<h1 class="title-innerpage3">
            	<span><span>{{-- {{ trans('pages.Shop') }} --}}Coming soon</span></span> 
         	</h1>
    	</div>
    </section>
  </div>
@endsection
<script type="text/javascript">
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

	
	

</script>