@extends('master')
@section('content')
  <div class="innerpage-style1">
    <span class="leftpageimg"></span>
    <span class="rightpageimg"></span>
    <section class="banner-innerpage">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1>
              <span class="title-icon-left"></span>
              <span class="title-icon-right"></span>
              <span class="title-icon-top"></span>
              <span class="title-icon-bottom"></span>
               Food & Drink
            </h1>
          </div>
        </div>
      </div>   
    </section>
    <section class="innercontent">
      <div class="fd-elm fd-left">
        <div class="fdct">
            <h3 class="title-post-1">The Dinnering</h3>
            <div class="ctevent">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac mollis risus. Vivamus sed ex porttitor, ullamcorper eros vitae, feugiat elit. Sed fermentum et metus vel lobortis. Maecenas sit amet ante laoreet, efficitur eros a, rutrum nulla. Suspendisse at nulla tempor, sollicitudin mi ut, tempus est. Nam vel sapien at velit lobortis suscipit in eu urna. Fusce enim justo, ullamcorper id diam id, consectetur mollis magna. Quisque pellentesque magna a leo eleifend rhoncus. Aliquam eu accumsan diam, vel rhoncus augue.
            </div>
            <a href="#" class="bookingaction radius_4">Booking Table</a>
        </div>
        <div class="fdimg">
          <img  src="{{asset('public/images/food/res-img1.png')}}" />
        </div> 
      </div>

      <div class="fd-elm fd-right">
        <div class="fdct">
            <h3 class="title-post-1">The Dinnering</h3>
            <div class="ctevent">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac mollis risus. Vivamus sed ex porttitor, ullamcorper eros vitae, feugiat elit. Sed fermentum et metus vel lobortis. Maecenas sit amet ante laoreet, efficitur eros a, rutrum nulla. Suspendisse at nulla tempor, sollicitudin mi ut, tempus est. Nam vel sapien at velit lobortis suscipit in eu urna. Fusce enim justo, ullamcorper id diam id, consectetur mollis magna. Quisque pellentesque magna a leo eleifend rhoncus. Aliquam eu accumsan diam, vel rhoncus augue.
            </div>
            <a href="#" class="bookingaction radius_4">Booking Table</a>
        </div>
        <div class="fdimg">
          <img  src="{{asset('public/images/food/res-img2.png')}}" />
        </div> 
      </div>

      <div class="fd-elm fd-left">
        <div class="fdct">
            <h3 class="title-post-1">The Dinnering</h3>
            <div class="ctevent">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac mollis risus. Vivamus sed ex porttitor, ullamcorper eros vitae, feugiat elit. Sed fermentum et metus vel lobortis. Maecenas sit amet ante laoreet, efficitur eros a, rutrum nulla. Suspendisse at nulla tempor, sollicitudin mi ut, tempus est. Nam vel sapien at velit lobortis suscipit in eu urna. Fusce enim justo, ullamcorper id diam id, consectetur mollis magna. Quisque pellentesque magna a leo eleifend rhoncus. Aliquam eu accumsan diam, vel rhoncus augue.
            </div>
            <a href="#" class="bookingaction radius_4">Booking Table</a>
        </div>
        <div class="fdimg">
          <img  src="{{asset('public/images/food/res-img3.png')}}" />
        </div> 
      </div>

      <div class="fd-elm fd-right">
        <div class="fdct">
            <h3 class="title-post-1">The Dinnering</h3>
            <div class="ctevent">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac mollis risus. Vivamus sed ex porttitor, ullamcorper eros vitae, feugiat elit. Sed fermentum et metus vel lobortis. Maecenas sit amet ante laoreet, efficitur eros a, rutrum nulla. Suspendisse at nulla tempor, sollicitudin mi ut, tempus est. Nam vel sapien at velit lobortis suscipit in eu urna. Fusce enim justo, ullamcorper id diam id, consectetur mollis magna. Quisque pellentesque magna a leo eleifend rhoncus. Aliquam eu accumsan diam, vel rhoncus augue.
            </div>
            <a href="#" class="bookingaction radius_4">Booking Table</a>
        </div>
        <div class="fdimg">
          <img  src="{{asset('public/images/food/res-img4.png')}}" />
        </div> 
      </div>
        
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
